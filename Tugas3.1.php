<?php

class Pegadaian
{
    public $Pinjaman = 0;
    public $Bunga = 0;
    public $LamaAngsuran = 0; // bulan
    public $DendaPerHari = 0.5; // contoh 0.5% per hari
    public $HariTerlambat = 0;

    public function TotalPinjaman()
    {
        $Total = $this->Pinjaman + ($this->Pinjaman * $this->Bunga / 100);
        return $Total;
    }

    public function AngsuranPerbulan()
    {
        if ($this->LamaAngsuran == 0) {
            return 0;
        }
        $Angsuran = $this->TotalPinjaman() / $this->LamaAngsuran;
        return $Angsuran;
    }

    public function DendaKeterlambatan()
    {
        $Denda = $this->AngsuranPerbulan() * ($this->DendaPerHari / 100) * $this->HariTerlambat;
        return $Denda;
    }

    public function TotalPembayaran()
    {
        $TotalBayar = $this->AngsuranPerbulan() + $this->DendaKeterlambatan();
        return $TotalBayar;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Pegadaian Syariah Aman</title>
</head>
<body>

<h2>TOKO PEGADAIAN SYARIAH</h2>
<p>Jl Keadilan No 16</p>
<p>Telp. 72353459</p>

<h3>Program Penghitung Besaran Angsuran Hutang</h3>

<form method="POST">
    Besaran Pinjaman : Rp.
    <input type="number" name="pinjaman" required><br><br>

    Masukan besar bunga (%) :
    <input type="number" name="bunga" required><br><br>

    Lama angsuran (bulan) :
    <input type="number" name="lama" required><br><br>

    Keterlambatan Angsuran (hari) :
    <input type="number" name="telat" required><br><br>

    <button type="submit" name="hitung">Hitung</button>
</form>

<hr>

<?php
if (isset($_POST['hitung'])) {

    $Pegadaian = new Pegadaian();

    // Ambil dan amankan input
    $Pegadaian->Pinjaman = htmlspecialchars($_POST['pinjaman']);
    $Pegadaian->Bunga = htmlspecialchars($_POST['bunga']);
    $Pegadaian->LamaAngsuran = htmlspecialchars($_POST['lama']);
    $Pegadaian->HariTerlambat = htmlspecialchars($_POST['telat']);

    echo "<h3>HASIL PERHITUNGAN</h3>";
    echo "Besaran Pinjaman : Rp. " . number_format($Pegadaian->Pinjaman) . "<br>";
    echo "Bunga (%) : " . $Pegadaian->Bunga . "%<br>";
    echo "Total Pinjaman : Rp. " . number_format($Pegadaian->TotalPinjaman()) . "<br>";
    echo "Lama Angsuran : " . $Pegadaian->LamaAngsuran . " bulan<br>";
    echo "Angsuran Perbulan : Rp. " . number_format($Pegadaian->AngsuranPerbulan()) . "<br><br>";

    echo "<b>Keterlambatan Angsuran</b><br>";
    echo "Hari Terlambat : " . $Pegadaian->HariTerlambat . " hari<br>";
    echo "Denda : Rp. " . number_format($Pegadaian->DendaKeterlambatan()) . "<br><br>";

    echo "<b>Total Pembayaran Bulan Ini : Rp. " . number_format($Pegadaian->TotalPembayaran()) . "</b><br>";
}
?>

</body>
</html>