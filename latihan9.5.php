<?php
//membuat class
class Kendaraan{
    var $merek;
    var $jmlroda;
    var $harga;
    var $warna;
    var $bhnbakar;
    var $tahun;

    function setMerek($x)
    {
        $this->merek = $x;
    }

    function setHarga($x)
    {
        $this->harga = $x;
    }

    function setjmlroda($x)
    {
        $this->jmlroda = $x;
    }

    function setwarna($x)
    {
        $this->warna = $x;
    }

    function setbhnbakar($x)
    {
        $this->bhnbakar = $x;
    }

    function settahun($x)
    {
        $this->tahun = $x;
    }
}

// objek 1
$kendaraan1 = new Kendaraan();
$kendaraan1->setMerek('Toyota Yaris');
$kendaraan1->setjmlroda(4);
$kendaraan1->setHarga(160000000);
$kendaraan1->setwarna("Merah");
$kendaraan1->setbhnbakar("Premium");
$kendaraan1->settahun(2005);

// objek 2
$kendaraan2 = new Kendaraan();
$kendaraan2->setMerek('Honda Scoopy');
$kendaraan2->setjmlroda(2);
$kendaraan2->setHarga(13000000);
$kendaraan2->setwarna("Putih");
$kendaraan2->setbhnbakar("Premium");
$kendaraan2->settahun(2004);

// objek 3
$kendaraan3 = new Kendaraan();
$kendaraan3->setMerek('Isuzu Panther');
$kendaraan3->setjmlroda(4);
$kendaraan3->setHarga(170000000);
$kendaraan3->setwarna("Hitam");
$kendaraan3->setbhnbakar("Solar");
$kendaraan3->settahun(2003);

// output kendaraan 1
echo $kendaraan1->merek;
echo "<br>";
echo $kendaraan1->jmlroda;
echo "<br>";
echo $kendaraan1->harga;
echo "<br>";
echo $kendaraan1->warna;
echo "<br>";
echo $kendaraan1->bhnbakar;
echo "<br>";
echo $kendaraan1->tahun;
echo "<br><br>";

// output kendaraan 2
echo $kendaraan2->merek;
echo "<br>";
echo $kendaraan2->jmlroda;
echo "<br>";
echo $kendaraan2->harga;
echo "<br>";
echo $kendaraan2->warna;
echo "<br>";
echo $kendaraan2->bhnbakar;
echo "<br>";
echo $kendaraan2->tahun;
echo "<br><br>";

// output kendaraan 3
echo $kendaraan3->merek;
echo "<br>";
echo $kendaraan3->jmlroda;
echo "<br>";
echo $kendaraan3->harga;
echo "<br>";
echo $kendaraan3->warna;
echo "<br>";
echo $kendaraan3->bhnbakar;
echo "<br>";
echo $kendaraan3->tahun;
?>