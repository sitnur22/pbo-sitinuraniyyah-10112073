<?php
// Membuat class bernama suhu
class Suhu {
    // Untuk menyimpan nilai suhu dan satuan suhu
    private $nilai;
    private $satuan;
    // Constructor: dijalankan saat objek dibuat
    // Berfungsi untuk mengisi nilai awal suhu dan satuannya
    public function __construct($nilai, $satuan){
        $this->nilai = $nilai;
        $this->satuan = $satuan;
    }
    // method untuk mengubah suhu menjadi celsius
    public function keCelsius(){
        if($this->satuan == "Kelvin"){
            return $this->nilai - 273.15;
        }elseif($this->satuan == "Fahrenheit"){
            return ($this->nilai - 32) * 5/9;
        }
        return $this->nilai; // jika sudah celsius, kembalikan nilai asli
    }
    // Method untuk mengubah suhu menjadi fahrenheit
    public function keFahrenheit(){
        if($this->satuan == "Kelvin"){
            return ($this->nilai - 273.15) * 9/5 + 32;
        }elseif($this->satuan == "Celsius"){
            return ($this->nilai * 9/5) + 32;
        }
        return $this->nilai;// jika fagrenheit, kembalikan nilai asli
    }
}
// variabel untuk menampung hasil konversi
$hasilC = "";
$hasilF = "";
$satuan = "";
// Mengecek apakah tombol "hitung" pada form ditekan
if(isset($_POST['hitung'])){
    $nilai = $_POST['nilai'];
    $satuan = $_POST['satuan'];

    $obj = new Suhu($nilai, $satuan);

    $hasilC = $obj->keCelsius();
    $hasilF = $obj->keFahrenheit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Kalkulator Konversi Suhu</title>
</head>
<body>

<h1>Kalkulator Konversi Suhu Siti</h1>

<form method="post">
Nilai Suhu:
<input type="number" name="nilai" required><br><br>

Satuan:
<select name="satuan">
<option value="Celsius">Celsius</option>
<option value="Kelvin">Kelvin</option>
<option value="Fahrenheit">Fahrenheit</option>
</select><br><br>

<button name="hitung">Hitung</button>
</form>

<?php if($hasilC !== ""){ ?>
<hr>
<h3>Hasil konversi dari <?php echo $satuan; ?>:</h3>
Celsius = <?php echo round($hasilC,2); ?><br>
Fahrenheit = <?php echo round($hasilF,2); ?>
<?php } ?>

</body>
</html>