<?php include '../service/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Perhitungan Denda - IMS Finance</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Kalkulator Perhitungan Denda</h1>
        </header>

        <!-- Penalty Calculator Form -->
        <div class="form-container" style="margin-bottom: 40px;">
            <form action="" method="get">
                <label for="kontrak_no">Pilih No. Kontrak</label>
                <select name="kontrak_no" id="kontrak_no" required>
                    <option value="">-- Pilih Kontrak --</option>
                    <?php
                    $sql_contracts = "SELECT KONTRAK_NO, CLIENT_NAME FROM contracts ORDER BY KONTRAK_NO";
                    $result_contracts = $conn->query($sql_contracts);
                    if ($result_contracts->num_rows > 0) {
                        while($row = $result_contracts->fetch_assoc()) {
                            $selected = (isset($_GET['kontrak_no']) && $_GET['kontrak_no'] == $row['KONTRAK_NO']) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($row['KONTRAK_NO']) . "' $selected>" . htmlspecialchars($row['KONTRAK_NO']) . " (" . htmlspecialchars($row['CLIENT_NAME']) . ")</option>";
                        }
                    }
                    ?>
                </select>

                <label for="calculation_date">Tanggal Perhitungan Denda</label>
                <input type="date" name="calculation_date" id="calculation_date" value="<?php echo isset($_GET['calculation_date']) ? htmlspecialchars($_GET['calculation_date']) : date('Y-m-d'); ?>" required>

                <button type="submit" name="calculate_penalty">Hitung Denda</button>
            </form>
        </div>

        <!-- Report Table -->
        <?php if (isset($_GET['calculate_penalty'])): ?>
        <div class="table-container">
            <h2>Hasil Perhitungan Denda</h2>
            <table>
                <thead>
                    <tr>
                        <th>Angsuran Ke-</th>
                        <th>Tgl. Jatuh Tempo</th>
                        <th>Hari Keterlambatan</th>
                        <th>Total Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kontrak_no = $_GET['kontrak_no'];
                    $calculation_date = $_GET['calculation_date'];
                    $total_denda_keseluruhan = 0;

                    $stmt = $conn->prepare(
                        "SELECT ANGSURAN_KE, TANGGAL_JATUH_TEMPO, ANGSURAN_PER_BULAN, 
                         DATEDIFF(?, TANGGAL_JATUH_TEMPO) AS HARI_KETERLAMBATAN, 
                         (ANGSURAN_PER_BULAN * 0.001 * DATEDIFF(?, TANGGAL_JATUH_TEMPO)) AS TOTAL_DENDA
                         FROM installment_schedules
                         WHERE KONTRAK_NO = ? AND TANGGAL_JATUH_TEMPO < ?"
                    );
                    $stmt->bind_param("ssss", $calculation_date, $calculation_date, $kontrak_no, $calculation_date);
                    $stmt->execute();
                    $result_report = $stmt->get_result();

                    if ($result_report->num_rows > 0) {
                        while($row = $result_report->fetch_assoc()) {
                            // Only show positive days of delay
                            if ($row["HARI_KETERLAMBATAN"] > 0) {
                                echo "<tr>";
                                echo "<td>" . $row["ANGSURAN_KE"] . "</td>";
                                echo "<td>" . date("d-m-Y", strtotime($row["TANGGAL_JATUH_TEMPO"])) . "</td>";
                                echo "<td>" . $row["HARI_KETERLAMBATAN"] . " hari</td>";
                                echo "<td>Rp " . number_format($row["TOTAL_DENDA"], 2, ',', '.') . "</td>";
                                echo "</tr>";
                                $total_denda_keseluruhan += $row["TOTAL_DENDA"];
                            }
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada angsuran yang terlambat untuk kontrak ini pada tanggal yang dipilih.</td></tr>";
                    }
                    $stmt->close();
                    ?>
                </tbody>
                <?php if ($total_denda_keseluruhan > 0): ?>
                <tfoot>
                    <tr>
                        <th colspan="3" style="text-align:right;">Total Denda Keseluruhan</th>
                        <th>Rp <?php echo number_format($total_denda_keseluruhan, 2, ',', '.'); ?></th>
                    </tr>
                </tfoot>
                <?php endif; ?>
            </table>
        </div>
        <?php endif; ?>

        <br>
        <a href="../index.php" style="display: inline-block; margin-top: 20px;">Kembali ke Dashboard</a>
    </div>
</body>
</html>
<?php $conn->close(); ?>
