<?php

function formatRupiah($angka): string {
    return "Rp " . number_format($angka, 0, ',', '.');
}

class BelanjaToko {

    public $namaPembeli;
    public $member;
    public $totalBelanja;

    public function hitungDiskon(): int {

        if ($this->member == "Memiliki") {

            if ($this->totalBelanja > 500000) {
                return 50000;
            } elseif ($this->totalBelanja > 100000) {
                return 15000;
            } else {
                return 0;
            }

        } else {

            if ($this->totalBelanja > 100000) {
                return 5000;
            } else {
                return 0;
            }

        }
    }

    public function hitungTotal(): int {
        $diskon = $this->hitungDiskon();
        return $this->totalBelanja - $diskon;
    }
}

$dataBelanja = [

    [
        "nama" => "Pembeli 1",
        "member" => "Memiliki",
        "belanja" => 200000
    ],

    [
        "nama" => "Pembeli 2",
        "member" => "Memiliki",
        "belanja" => 570000
    ],

    [
        "nama" => "Pembeli 3",
        "member" => "Tidak Memiliki",
        "belanja" => 120000
    ],

    [
        "nama" => "Pembeli 4",
        "member" => "Tidak Memiliki",
        "belanja" => 90000
    ]

];

$no = 1;

foreach ($dataBelanja as $data) {

    echo "<h3>TRANSAKSI $no</h3>";

    $errors = [];

    $nama = $data["nama"];
    $member = $data["member"];
    $belanja = $data["belanja"];

    // VALIDASI
    if (empty($nama)) {
        $errors[] = "Nama pembeli tidak boleh kosong.";
    }

    if ($belanja <= 0) {
        $errors[] = "Total belanja harus lebih dari 0.";
    }

    if (!empty($errors)) {

        foreach ($errors as $error) {
            echo $error . "<br>";
        }

    } else {

        $toko = new BelanjaToko();
        $toko->namaPembeli = $nama;
        $toko->member = $member;
        $toko->totalBelanja = $belanja;

        $diskon = $toko->hitungDiskon();
        $total = $toko->hitungTotal();

        echo "Pembeli : $toko->namaPembeli<br>";
        echo "Kartu Member : $toko->member<br>";
        echo "Total Belanja : " . formatRupiah($toko->totalBelanja) . "<br>";
        echo "Diskon : " . formatRupiah($diskon) . "<br>";
        echo "<b>Total Bayar : " . formatRupiah($total) . "</b><br><br>";

    }

    $no++;
}

?>