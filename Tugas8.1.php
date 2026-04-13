<?php

class GajiKaryawan {
    public $data = [];
    public $lembur = 15000;

    // constructor
    public function __construct(){
        echo "Program Gaji Karyawan Dimulai...\n";
    }

    // destructor
    public function __destruct(){
        echo "Program Selesai...\n";
        unset($this->data);
    }

    // method gaji pokok
    public function getGajiPokok($golongan){
        $gaji = [
            "Ib" => 1250000,
            "Ic" => 1300000,
            "Id" => 1350000,
            "IIa" => 2000000,
            "IIb" => 2100000,
            "IIc" => 2200000,
            "IId" => 2300000,
            "IIIa" => 2400000,
            "IIIb" => 2500000,
            "IIIc" => 2600000,
            "IIId" => 2700000,
            "IVa" => 2800000,
            "IVb" => 2900000,
            "IVc" => 3000000,
            "IVd" => 3100000
        ];

        return $gaji[$golongan] ?? 0;
    }

    // tampil data
    public function tampilkan(){
        echo "\n===== DATA GAJI KARYAWAN =====\n";
        echo "No | Nama | Golongan | Jam Lembur | Total Gaji\n";

        $no = 1;
        foreach($this->data as $d){
            echo $no++ ." | ".
                 $d['nama']." | ".
                 $d['golongan']." | ".
                 $d['jam']." | Rp".
                 number_format($d['total'],0,",",".")."\n";
        }
    }

    // tambah data
    public function tambah(){
        echo "Nama: ";
        $nama = trim(fgets(STDIN));

        echo "Golongan: ";
        $gol = trim(fgets(STDIN));

        echo "Jam lembur: ";
        $jam = trim(fgets(STDIN));

        $total = $this->getGajiPokok($gol) + ($jam * $this->lembur);

        $this->data[] = [
            "nama"=>$nama,
            "golongan"=>$gol,
            "jam"=>$jam,
            "total"=>$total
        ];

        echo "Data berhasil ditambah.\n";
    }

    // hapus data
    public function hapus(){
        $this->tampilkan();
        echo "Hapus nomor: ";
        $no = trim(fgets(STDIN));

        unset($this->data[$no-1]);
        echo "Data dihapus.\n";
    }
}

$gaji = new GajiKaryawan();

do {
    echo "\n===== MENU GAJI KARYAWAN =====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Hapus Data\n";
    echo "4. Keluar\n";
    echo "Pilih menu: ";

    $menu = trim(fgets(STDIN));

    switch($menu){
        case 1:
            $gaji->tampilkan();
            break;
        case 2:
            $gaji->tambah();
            break;
        case 3:
            $gaji->hapus();
            break;
        case 4:
            echo "Keluar...\n";
            break;
        default:
            echo "Menu tidak ada\n";
    }

}while($menu != 4);

?>