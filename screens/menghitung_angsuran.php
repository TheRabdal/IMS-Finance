<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Angsuran - IMS Finance</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Kalkulator Simulasi Angsuran</h1>
        </header>
        
        <div class="form-container">
            <form action="" method="post">
                <label for="otr_calc">OTR (Harga Mobil)</label>
                <input type="text" name="otr_calc" id="otr_calc" value="240000000" required>

                <label for="dp">Down Payment (%)</label>
                <input type="text" name="dp" id="dp" value="20" required>

                <label for="jangka_waktu">Jangka Waktu (tahun)</label>
                <input type="text" name="jangka_waktu" id="jangka_waktu" value="1.5" required>

                <button type="submit" name="calculate">Hitung</button>
            </form>

            <?php
            if (isset($_POST['calculate'])) {
                $otr = (float)$_POST['otr_calc'];
                $dp_percentage = (float)$_POST['dp'];
                $jangka_waktu_tahun = (float)$_POST['jangka_waktu'];
                $dp_amount = $otr * ($dp_percentage / 100);
                $pokok_utang = $otr - $dp_amount;
                $jangka_waktu_bulan = $jangka_waktu_tahun * 12;
                $bunga_tahunan = ($jangka_waktu_bulan <= 12) ? 12 : (($jangka_waktu_bulan <= 24) ? 14 : 16.5);
                $total_bunga = $pokok_utang * ($bunga_tahunan / 100) * $jangka_waktu_tahun;
                $total_utang = $pokok_utang + $total_bunga;
                $angsuran_per_bulan = $total_utang / $jangka_waktu_bulan;

                echo "<div style='margin-top: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; border: 1px solid #dee2e6;'>";
                echo "<h4 style='margin-top: 0; color: var(--primary-color);'>Rincian Hasil Perhitungan</h4>";
                echo "<p style='margin: 5px 0;'>OTR: Rp " . number_format($otr, 2, ',', '.') . "</p>";
                echo "<p style='margin: 5px 0;'>Down Payment (" . $dp_percentage . "%): Rp " . number_format($dp_amount, 2, ',', '.') . "</p>";
                echo "<p style='margin: 5px 0;'>Pokok Utang: Rp " . number_format($pokok_utang, 2, ',', '.') . "</p>";
                echo "<p style='margin: 5px 0;'>Jangka Waktu: " . $jangka_waktu_bulan . " bulan</p>";
                echo "<p style='margin: 5px 0;'>Bunga per Tahun: " . $bunga_tahunan . "%</p>";
                echo "<p style='margin: 5px 0;'>Total Bunga: Rp " . number_format($total_bunga, 2, ',', '.') . "</p>";
                echo "<p style='margin: 5px 0;'>Total Utang: Rp " . number_format($total_utang, 2, ',', '.') . "</p>";
                echo "<hr style='border: none; border-top: 1px solid #dee2e6; margin: 10px 0;'>";
                echo "<p style='margin: 5px 0; font-size: 1.1em;'><strong>Estimasi Angsuran per Bulan: Rp " . number_format($angsuran_per_bulan, 2, ',', '.') . "</strong></p>";
                echo "</div>";
            }
            ?>
        </div>

        <br>
        <a href="../index.php" style="display: inline-block; margin-top: 20px;">Kembali ke Dashboard</a>
    </div>
</body>
</html>