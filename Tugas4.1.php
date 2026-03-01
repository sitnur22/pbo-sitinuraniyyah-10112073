<?php

class Mahasiswa{
    public $nama;
    public $kelas;
    public $mataKuliah;
    public $nilai;

    public function keterangan() {
        if ($this->nilai >= 70){
            return "Lulus Kuis";
        } else {
            return "Tidak Lulus Kuis";
        }
    }
}

// Array data mahasiswa
$data= [
    ['nama' => 'Aditya',
    'kelas' => 'SI 2',
    'mataKuliah' => 'Pemprograman Berorientasi Objek',
    'nilai' => 80],

    ['nama' => 'Shinta',
    'kelas' => 'SI 2',
    'mataKuliah' => 'Pemprograman Berorientasi Objek',
    'nilai' => 75],

    ['nama' => 'Ineu',
    'kelas' => 'SI 2',
    'mataKuliah' => 'Pemprograman Berorientasi Objek',
    'nilai' => 55]
];

//looping untuk semua tampil
foreach ($data as $item){
    //instansiasi objek 
    $mahasiswa = new Mahasiswa();
    $mahasiswa->nama = $item["nama"];
    $mahasiswa->kelas = $item["kelas"];
    $mahasiswa->mataKuliah = $item["mataKuliah"];
    $mahasiswa->nilai = $item["nilai"];

//output
echo "<h2> DATA NILAI PBO MAHASISWA</h2>";
echo "nama: " . $mahasiswa->nama . "<br>";
echo "kelas: " . $mahasiswa->kelas . "<br>";
echo "mataKuliah: " . $mahasiswa->mataKuliah . "<br>";
echo "nilai: " . $mahasiswa->nilai . "<br>";
echo $mahasiswa->keterangan(). "<br>";
echo "<hr>";
}
?>