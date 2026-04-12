<!DOCTYPE html>
<html>
<head>
    <title>Gaji Karyawan</title>
</head>
<body>

<h2>Input Data Karyawan</h2>

<form method="POST">
    Nama: <input type="text" name="nama"><br><br>
    Gaji Pokok: <input type="number" name="gaji"><br><br>
    Masa Kerja (tahun): <input type="number" name="masa"><br><br>

    Tipe:
    <select name="tipe">
        <option value="programmer">Programmer</option>
        <option value="direktur">Direktur</option>
        <option value="mingguan">Pegawai Mingguan</option>
    </select><br><br>

    Harga Barang: <input type="number" name="harga"><br><br>
    Stok Barang: <input type="number" name="stok"><br><br>
    Jumlah Terjual: <input type="number" name="jual"><br><br>

    <button type="submit" name="proses">Hitung Gaji</button>
</form>

<?php

// ================= CLASS INDUK =================
class Employee {
    public $nama, $gaji, $masa;

    public function __construct($nama, $gaji, $masa){
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->masa = $masa;
    }

    public function hitungGaji(){
        return $this->gaji;
    }

    public function getInfo(){
        return "$this->nama - Gaji: Rp ".number_format($this->hitungGaji(),0,",",".");
    }
}

// ================= PROGRAMMER =================
class Programmer extends Employee {
    public function hitungGaji(){
        if($this->masa < 1){
            return $this->gaji;
        } elseif($this->masa <= 10){
            return $this->gaji + ($this->gaji * 0.01 * $this->masa);
        } else {
            return $this->gaji + ($this->gaji * 0.02 * $this->masa);
        }
    }
}

// ================= DIREKTUR =================
class Direktur extends Employee {
    public function hitungGaji(){
        $bonus = $this->gaji * 0.5 * $this->masa;
        $tunjangan = $this->gaji * 0.1 * $this->masa;
        return $this->gaji + $bonus + $tunjangan;
    }
}

// ================= PEGAWAI MINGGUAN =================
class PegawaiMingguan extends Employee {
    public $harga, $stok, $jual;

    public function __construct($nama, $gaji, $masa, $harga, $stok, $jual){
        parent::__construct($nama, $gaji, $masa);
        $this->harga = $harga;
        $this->stok = $stok;
        $this->jual = $jual;
    }

    public function hitungGaji(){
        $persen = $this->jual / $this->stok;

        if($persen > 0.7){
            $bonus = 0.10 * $this->harga * $this->jual;
        } else {
            $bonus = 0.03 * $this->harga * $this->jual;
        }

        return $this->gaji + $bonus;
    }
}

// ================= PROSES FORM =================
if(isset($_POST['proses'])){

    $data = [
        "tipe" => $_POST['tipe'],
        "nama" => $_POST['nama'],
        "gaji" => $_POST['gaji'],
        "masa" => $_POST['masa'],
        "harga" => $_POST['harga'],
        "stok" => $_POST['stok'],
        "jual" => $_POST['jual']
    ];

    if($data["tipe"] == "programmer"){
        $obj = new Programmer($data["nama"], $data["gaji"], $data["masa"]);
    } elseif($data["tipe"] == "direktur"){
        $obj = new Direktur($data["nama"], $data["gaji"], $data["masa"]);
    } else {
        $obj = new PegawaiMingguan(
            $data["nama"],
            $data["gaji"],
            $data["masa"],
            $data["harga"],
            $data["stok"],
            $data["jual"]
        );
    }

    echo "<hr>";
    echo "<h3>Hasil:</h3>";
    echo $obj->getInfo();
}
?>

</body>
</html>