<?php

//ini adalah function
function formatRupiah($angka){
    return "Rp" . number_format($angka,0,'.','.');
}
class Belanja {
    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;

    //ini adalah method yang...
    public function hitungSubtotal(): float|int {
        return $this->hargaBarang * $this->jumlahBeli;
    }

    public function hitungTotalDenganDiskon($persenDiskon): float|int {
        $subtotal = $this->hitungSubtotal();
        $diskon = ($persenDiskon / 100) * $subtotal;
        return $subtotal - $diskon;
    }
}

//buat array data pembelian
$data = [
    'namaPembeli' => 'Miftah',
    'namaBarang' => 'Mie Ayam',
    'hargaBarang' => 12000,
    'jumlahBeli' => 12
];

//instansiasi objek belanja dari class Belanja
$belanja = new Belanja();
$belanja->namaPembeli = $data["namaPembeli"];
$belanja->namaBarang = $data["namaBarang"];
$belanja->hargaBarang = $data['hargaBarang'];
$belanja->jumlahBeli = $data["jumlahBeli"];

//output
echo "<h2> STRUK BELANJA WARUNG A </h2>";
echo "Pembeli: " . $belanja->namaPembeli . "<br>";
echo "Barang: " . $belanja->namaBarang . "<br>";
echo "Subtotal: " . formatRupiah($belanja->hitungSubtotal()) . "<br>";
echo "Total (Diskon 10%): " . formatRupiah($belanja->hitungTotalDenganDiskon(persenDiskon: 10)). "<br>";
?>

<html>
    <head>
        <title>
            Belajar OOP - Form Produk
        </title>
    </head>

    <body>
        <h2> Input Data Produk</h2>
        
    <form method="POST">
    Nama produk:
    <input type="text" name="nama"><br><br>

    Harga:
    <input type="number" name="harga"><br><br>
    
    Jumlah:
    <input type="number" name="jumlah"><br><br>

    Diskon (%):
    <input type="number" name="diskon"><br><br>

    <button type="submit">Proses</button>
    </form>

    </body>
</html>

<?php


class Produk {
    public $nama;
    public $harga;

    public function hitungSubtotal($jumlah) {
        return $this->harga * $jumlah;
    }

    public function hitungDiskon($subtotal, $persenDiskon){
        return ($persenDiskon / 100) * $subtotal;
    }

    public function hitungTotal($jumlah, $persenDiskon){
        $subtotal = $this->hitungSubtotal($jumlah);
        $diskon = $this->hitungDiskon($subtotal, $persenDiskon);
        return $subtotal - $diskon;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = [
    "nama" => htmlspecialchars($_POST['nama']),
    "harga" => (int) $_POST['harga'],
    "jumlah" => (int) $_POST['jumlah'],
    "diskon" => (int) $_POST['diskon']
];

$produk = new Produk();
$produk->nama = $data["nama"];
$produk->harga = $data["harga"];

$subtotal = $produk->hitungSubtotal($data["jumlah"]);
$diskon = $produk->hitungDiskon($subtotal, $data["diskon"]);
$total = $produk->hitungTotal($data["jumlah"], $data["diskon"]);

echo "<h2>HASIL BELANJA</H2>";
echo "Produk : " . $produk->nama . "<br>";
echo "Harga : " . formatRupiah($produk->harga) . "<br>";
echo "Jumlah : " . $data["jumlah"] . "<br>";
echo "Subtotal : " . formatRupiah($subtotal) . "<br>";
echo "Diskon (" . $data["diskon"] . ") :" . formatRupiah($diskon) . "<br>";
echo "<b>Total Bayar : ". formatRupiah($total) . "</b>";
}
?>