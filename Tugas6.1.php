<?php

class BangunRuang {

    // Property
    public $jenis;
    public $sisi;
    public $jari;
    public $tinggi;

    // Function / Method
    public function hitungVolume(){

        switch($this->jenis){

            case "Bola":
                $volume = (4/3) * 3.14 * pow($this->jari,3);
            break;

            case "Kerucut":
                $volume = (1/3) * 3.14 * pow($this->jari,2) * $this->tinggi;
            break;

            case "Limas Segi Empat":
                $volume = (1/3) * pow($this->sisi,2) * $this->tinggi;
            break;

            case "Kubus":
                $volume = pow($this->sisi,3);
            break;

            case "Tabung":
                $volume = 3.14 * pow($this->jari,2) * $this->tinggi;
            break;

            default:
                $volume = 0;
        }

        return $volume;
    }
}

// Array data bangun ruang
$dataBangun = [
    ["jenis"=>"Bola","sisi"=>0,"jari"=>7,"tinggi"=>0],
    ["jenis"=>"Kerucut","sisi"=>0,"jari"=>14,"tinggi"=>10],
    ["jenis"=>"Limas Segi Empat","sisi"=>8,"jari"=>0,"tinggi"=>24],
    ["jenis"=>"Kubus","sisi"=>30,"jari"=>0,"tinggi"=>0],
    ["jenis"=>"Tabung","sisi"=>0,"jari"=>7,"tinggi"=>10]
];

?>

<!DOCTYPE html>
<html>
<head>
<title>Volume Bangun Ruang</title>
</head>
<body>

<h2>Tabel Volume Bangun Ruang</h2>

<table border="1" cellpadding="6">
<tr>
<th>Jenis</th>
<th>Sisi</th>
<th>Jari-jari</th>
<th>Tinggi</th>
<th>Volume</th>
</tr>

<?php

// Perulangan
foreach($dataBangun as $data){

    // Object
    $obj = new BangunRuang();

    // Mengisi property
    $obj->jenis = $data['jenis'];
    $obj->sisi = $data['sisi'];
    $obj->jari = $data['jari'];
    $obj->tinggi = $data['tinggi'];

    // Memanggil function
    $volume = $obj->hitungVolume();

    echo "<tr>";
    echo "<td>".$obj->jenis."</td>";
    echo "<td>".$obj->sisi."</td>";
    echo "<td>".$obj->jari."</td>";
    echo "<td>".$obj->tinggi."</td>";
    echo "<td>".$volume."</td>";
    echo "</tr>";
}

?>

</table>

</body>
</html>