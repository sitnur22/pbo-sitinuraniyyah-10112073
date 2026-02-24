<?php

class Produk {

    public $nama;
    public $harga;

    public function statusHarga() {
        if ($this->harga > 100000) {
            return "Produk Mahal";
        } else {
            return "Produk Terjangkau";
        }
    }
}

if (isset($_POST['nama']) && isset($_POST['harga'])) {

    $produk1 = new Produk();

    $produk1->nama  = htmlspecialchars($_POST['nama']);
    $produk1->harga = htmlspecialchars($_POST['harga']);

    echo "<h2>Data Produk</h2>";
    echo "Nama Produk : " . $produk1->nama . "<br>";
    echo "Harga : Rp " . $produk1->harga . "<br>";
    echo "Status : " . $produk1->statusHarga();

} else {
    echo "Silakan isi form terlebih dahulu melalui form.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Produk</title>
</head>
<body>

<h2>Input Data Produk</h2>

<form action="latihan3.2.php" method="POST">
    Nama Produk :
    <input type="text" name="nama"><br><br>

    Harga :
    <input type="number" name="harga"><br><br>

    <input type="submit" value="Simpan">
</form>

</body>
</html>