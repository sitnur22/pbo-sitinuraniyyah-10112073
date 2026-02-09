<?php
class Belanja{ // ini adalah class belanja 
    public string $NamaPembeli="rina";
    public string $NamaBarang="pulpen";
    public int $HargaBarang=3000;
    public int $JumlahBarang=2;
    public float $TotalBayar=6000;
    public float $Diskon; 
    // ini variabel intance
    public static float $pajak = 0.02;

    public function __construct ($NamaPembeli){
        $this->NamaPembeli = $NamaPembeli;
        
    }
    public function HitungTotal(): float
    {
        $SubTotal = $this->HargaBarang * $this->JumlahBarang;
        return $subtotal;
    }
    public function tampilrincian ($NamaPembeli): void{
        echo "Nama Pembeli : " . $this->NamaPembeli . "<br>";
        echo "Nama Barang : " . $this->NamaBarang . "<br>";
        echo "Harga Barang : " . $this->HargaBarang . "<br>";
        echo "Jumlah Barang : " . $this->JumlahBarang . "<br>";
        echo "Total Bayar : " . $this->TotalBayar . "<br>";
    }
}
$Belanja1 = new Belanja(NamaPembeli: "rina");
$Belanja1->tampilrincian(NamaPembeli: $Belanja1->NamaPembeli);
$belanja1 = new Belanja(NamaBarang: "pulpen");
$Belanja1->tampilrincian(NamaBarang: $Belanja1->NamaBarang);
$Belanja1 = new Belanja(HargaBarang: "3000");
$Belanja1->tampilrincian(HargaBarang: $Belanja1->HargaBarang);
$Belanja1 = new Belanja(JumlahBarang: "2");
$Belanja1->tampilrincian(JumlahBarang: $Belanja1->JumlahBarang);
$Belanja1 = new Belanja(TotalBayar: "6000");
$Belanja1->tampilrincian(TotalBayar: $Belanja1->TotalBayar);