<?php
require_once "domain_object/node_barang.php";

class modelBarang{
    private $barangs = [];
    private $nextId = 1;

    public function __construct() {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = isset($_SESSION['lastbarangId']) ? $_SESSION['lastbarangId'] + 1 : 1; // Ambil dari sesi
            
        } else {
            $this->initialiazeDefaultbarang();
            $this->nextId = 4; // Misalnya, jika memiliki 3 barang default
        }
    }

    public function initialiazeDefaultbarang() {
        $this->addbarang("Vergil Set : Devil May Cry",5,900000);
        $this->addbarang("Dante set : Devil May Cry",5,870000);
        $this->addbarang("Yuki Makoto Set : Persona 3",6,450000);
        $this->addbarang("Narukami Yuu Set : Persona 4",6,500000);
        $this->addbarang("Amamiya Ren Set : Persona 5",6,670000);
        $this->addbarang("Kiryuu Kazuma Set : yakuza 0",5,800000);

    }
    
    public function addbarang($barang_name, $barang_stock, $barang_harga) {
        error_log("Adding barang: Name=$barang_name, pw=$barang_stock, role=$barang_harga");
        $barang = new barang($this->nextId, $barang_name, $barang_stock, $barang_harga);
        $this->barangs[] = $barang;
        $_SESSION['lastbarangId'] = $this->nextId; // Simpan ID terakhir yang digunakan
        $this->nextId++; // increment
        $this->saveToSession();
        return true;
    }
    

    private function saveToSession() {
        $_SESSION['barangs'] = serialize($this->barangs);
    }
    
    public function getAllbarang() {
        return $this->barangs;
    }
    
    public function getbarangById($id) {
        foreach ($this->barangs as $barang) {
            if ($barang->barang_id == $id) {
                return $barang;
            }
        }
        return null;
    }

    public function updatebarang($id, $barang_barangname, $barang_stock, $barang_harga) {
        foreach ($this->barangs as $barang) {
            if ($barang->barang_id == $id) {
                $barang->barang_barangname = $barang_barangname;
                $barang->barang_stock = $barang_stock;
                $barang->barang_harga = $barang_harga;
                
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
    
    public function deletebarang($id) {
        foreach ($this->barangs as $key => $barang) {
            if ($barang->barang_id == $id) {
                unset($this->barangs[$key]);
                $this->barangs = array_values($this->barangs);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}

?>