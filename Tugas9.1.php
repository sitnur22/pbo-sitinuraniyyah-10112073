<?php

// =======================
// CLASS INDUK
// =======================
class Tabungan {
    protected $saldo;

    public function __construct($saldoAwal) {
        $this->saldo = $saldoAwal;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setor($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            echo "Berhasil setor Rp$jumlah\n";
        }
    }

    public function tarik($jumlah) {
        if ($jumlah > 0 && $jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            echo "Berhasil tarik Rp$jumlah\n";
        } else {
            echo "Saldo tidak cukup!\n";
        }
    }
}

// =======================
// CLASS ANAK
// =======================
class Siswa extends Tabungan {
    private $nama;

    public function __construct($nama, $saldoAwal) {
        parent::__construct($saldoAwal);
        $this->nama = $nama;
    }

    public function tampilSaldo() {
        echo "Nama: {$this->nama} | Saldo: Rp{$this->saldo}\n";
    }
}

// =======================
// ARRAY SISWA
// =======================
$siswa = [
    new Siswa("Siswa 1", 10000),
    new Siswa("Siswa 2", 15000),
    new Siswa("Siswa 3", 20000)
];

// =======================
// SALDO AWAL
// =======================
echo "=== SALDO AWAL ===\n";
foreach ($siswa as $s) {
    $s->tampilSaldo();
}

// =======================
// TRANSAKSI
// =======================
do {
    echo "\n=== TRANSAKSI ===\n";

    // tampilkan daftar siswa
    foreach ($siswa as $index => $s) {
        echo ($index+1) . ". ";
        $s->tampilSaldo();
    }

    // pilih siswa
    $pilihSiswa = (int) readline("Pilih siswa (1-3): ");
    $index = $pilihSiswa - 1;

    // menu transaksi
    echo "1. Setor Tunai\n";
    echo "2. Tarik Tunai\n";

    $pilihTransaksi = (int) readline("Pilih transaksi: ");
    $jumlah = (int) readline("Masukkan jumlah uang: ");

    // proses transaksi
    if ($pilihTransaksi == 1) {
        $siswa[$index]->setor($jumlah);
    } elseif ($pilihTransaksi == 2) {
        $siswa[$index]->tarik($jumlah);
    }

    // tampil saldo akhir
    echo "\nSaldo sekarang:\n";
    $siswa[$index]->tampilSaldo();

    $ulang = readline("Ingin transaksi lagi? (y/n): ");

} while (strtolower($ulang) == 'y');