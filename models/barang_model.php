<?php
require_once 'domain_object/node_barang.php';

class modelBarang {
    private $barangs = [];
    private $nextId = 1;

    public function __construct() {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = count($this->barangs) + 1;
        } else {
            $this->initializeDefaultBarang();
        }
    }

    public function initializeDefaultBarang() {
        $this->addBarang("Pensil", 2000, 100);
        $this->addBarang("Buku", 5000, 50);
        $this->addBarang("Penggaris", 1500, 30);
    }

    public function addBarang($nama, $harga, $stok) {
        $barang = new Barang($this->nextId++, $nama, $harga, $stok);
        $this->barangs[] = $barang;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['barangs'] = serialize($this->barangs);
    }

    public function getAllBarangs() {
        return $this->barangs;
    }

    public function getBarangById($id) {
        foreach ($this->barangs as $barang) {
            if ($barang->id == $id) {
                return $barang;
            }
        }
        return null;
    }

    public function updateBarang($id, $nama, $harga, $stok) {
        foreach ($this->barangs as $barang) {
            if ($barang->id == $id) {
                $barang->nama = $nama;
                $barang->harga = $harga;
                $barang->stok = $stok;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteBarang($id) {
        foreach ($this->barangs as $key => $barang) {
            if ($barang->id == $id) {
                unset($this->barangs[$key]);
                $this->barangs = array_values($this->barangs);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getBarangByName($nama) {
        foreach ($this->barangs as $barang) {
            if ($barang->nama == $nama) {
                return $barang;
            }
        }
        return null;
    }

    public function updateStok($id_barang, $jumlah) {
        foreach ($this->barangs as $barang) {
            if ($barang->id == $id_barang) {
                // Pastikan stok tidak kurang dari 0
                if ($barang->stok >= $jumlah) {
                    $barang->stok -= $jumlah; // Kurangi stok dengan jumlah yang terjual
                    $this->saveToSession(); // Simpan perubahan ke session
                    return true; // Berhasil memperbarui stok
                } else {
                    return false; // Stok tidak cukup
                }
            }
        }
        return false; // Barang tidak ditemukan
    }
    

    public function getAvailableBarangs() {
        $availableBarangs = [];
        foreach ($this->barangs as $barang) {
            if ($barang->stok > 0) {
                $availableBarangs[] = $barang;
            }
        }
        return $availableBarangs;
    }
    
}
?>
