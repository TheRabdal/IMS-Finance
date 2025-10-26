<?php include '../service/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Angsuran Jatuh Tempo - IMS Finance</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Cek Angsuran Jatuh Tempo</h1>
        </header>

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

                <label for="calculation_date">Jatuh Tempo Sebelum Tanggal</label>
                <input type="date" name="calculation_date" id="calculation_date" value="<?php echo isset($_GET['calculation_date']) ? htmlspecialchars($_GET['calculation_date']) : date('Y-m-d'); ?>" required>

                <button type="submit" name="calculate_overdue">Tampilkan</button>
            </form>
        </div>

        <?php if (isset($_GET['calculate_overdue'])): ?>
        <div class="table-container">
            <h2>Hasil Laporan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Angsuran Ke-</th>
                        <th>Tgl. Jatuh Tempo</th>
                        <th>Jumlah Angsuran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $kontrak_no = $_GET['kontrak_no'];
                    $calculation_date = $_GET['calculation_date'];
                    $total_angsuran_jatuh_tempo = 0;

                    $stmt = $conn->prepare(
                        "SELECT ANGSURAN_KE, TANGGAL_JATUH_TEMPO, ANGSURAN_PER_BULAN
                         FROM installment_schedules
                         WHERE KONTRAK_NO = ? AND TANGGAL_JATUH_TEMPO < ?"
                    );
                    $stmt->bind_param("ss", $kontrak_no, $calculation_date);
                    $stmt->execute();
                    $result_report = $stmt->get_result();

                    if ($result_report->num_rows > 0) {
                        while($row = $result_report->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["ANGSURAN_KE"] . "</td>";
                            echo "<td>" . date("d-m-Y", strtotime($row["TANGGAL_JATUH_TEMPO"])) . "</td>";
                            echo "<td>Rp " . number_format($row["ANGSURAN_PER_BULAN"], 2, ',', '.') . "</td>";
                            echo "</tr>";
                            $total_angsuran_jatuh_tempo += $row["ANGSURAN_PER_BULAN"];
                        }
                    } else {
                        echo "<tr><td colspan='3'>Tidak ada angsuran yang jatuh tempo untuk kontrak ini sebelum tanggal yang dipilih.</td></tr>";
                    }
                    $stmt->close();
                    ?>
                </tbody>
                <?php if ($total_angsuran_jatuh_tempo > 0): ?>
                <tfoot>
                    <tr>
                        <th colspan="2" style="text-align:right;">Total Angsuran Jatuh Tempo</th>
                        <th>Rp <?php echo number_format($total_angsuran_jatuh_tempo, 2, ',', '.'); ?></th>
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
