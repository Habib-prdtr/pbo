<?php 
class persegi{
    public $sisi;

    public function __construct($sisi)
    {
        $this->sisi = $sisi;
    }

    public function luas(){
        return $this->sisi * $this->sisi;
    }
}

$objectPersegi1 = new persegi($sisi = 5);
$objectPersegi2 = new persegi($sisi = 6);

echo "luas persegi 1 :".$objectPersegi1->luas();
echo "<br>";
echo "luas persegi 2 :".$objectPersegi2->luas();

?>