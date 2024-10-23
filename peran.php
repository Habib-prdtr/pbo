<?php 
class peran{
    public $id_peran;
    public $nama_peran;
    public $desc_peran;
    public $status_peran;
    public $gaji_peran;
    public $barang = [];

    public function __construct($id_peran, $nama_peran, $desc_peran, $status_peran, $gaji_peran,$barang)
    {
        $this->id_peran = $id_peran;
        $this->nama_peran = $nama_peran;
        $this->desc_peran = $desc_peran;
        $this->status_peran = $status_peran;
        $this->gaji_peran = $gaji_peran;
        $this->barang = $barang;
    }

    public function hasil(){
        
        echo "id peran:".$this->id_peran;
        echo "<br>";
        echo "nama peran:".$this->nama_peran;
        echo "<br>";
        echo "deskripsi peran: ".$this->desc_peran;
        echo "<br>";
        echo "status peran: ".$this->status_peran;
        echo "<br>";
        echo "gaji peran: ".$this->gaji_peran;
        echo "<br>";
        echo "barang: ";
        foreach($this->barang as $barangs){
            echo $barangs;
            echo ", ";
        }
        echo "<br>";
        echo "<br>";
    }

}

$objectPeran1 = new peran(1,'habib' ,"kasir","aktif",10000,['sapu','lidi','cikrak']);
$objectPeran2 = new peran(2, "rizam","mahasiswa","aktif",30000,['mouse', 'keyboard', 'laptop']);
$objectPeran3 = new peran(3, "danu","dosen","aktif",20000,['cas', 'buku', 'spidol']);

$objectPeran1->hasil();
$objectPeran2->hasil();
$objectPeran3->hasil();
?>