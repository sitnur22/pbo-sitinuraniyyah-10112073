<?php

class kendaraan
{
    public $JumlahRoda=4;
    public $Warna;
    public $BahanBakar="Premium";
    public $Harga=100000000;
    public $Merek;
    public $TahunPembuatan=2004;
    
    public function StatusHarga()
    {
        if($this->Harga>50000000)
        {
        $Status="Harga Kendaraan Mahal";
        }
        else
        {
        $Status="Harga Kendaraan Murah";
        }
        return $Status;
    }
    function StatusSubsidi()
        {
        if($this->TahunPembuatan<2005 && $this->BahanBakar=="Premium")
        {
            $Status="DAPAT SUBSIDI";
        }
        else
        {
            $Status="TIDAK DAPAT SUBSIDI";
        }
        return $Status;
        }
    }

//instansi kelas
$ObjekKendaraan = new kendaraan();//pembuatan objek dari kelas
echo "Jumlah Roda :".$ObjekKendaraan->JumlahRoda."<br/>";//proses instansiasi pemanggilan variabel
echo "Status Harga :".$ObjekKendaraan->StatusHarga()."<br>";//proses instansiasi/pemanggilan function dari kelas
echo "Status Subsidi :".$ObjekKendaraan->StatusSubsidi();
?>

    
            