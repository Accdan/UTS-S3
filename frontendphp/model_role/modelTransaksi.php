<?php
require_once 'domain_object/nodeTransaksi.php';
require_once 'domain_object/node_detail_transaksi.php';
require_once 'domain_object/node_barang.php';
require_once 'domain_object/node_user.php';

class ModelTransaksi
{
    public $modelBarang;
    public $modelTransaksi;
    private $nextId = 1;
    public $modelUser;
    public $modelDetail;

    public function __construct()
    {
        $this->modelBarang = new ModelBarang();
        $this->modelUser = new modelUser();
        $this->modelDetail = new ModelDetailTransaksi();
        if (isset($_SESSION['transaksi'])) {
            $this->modelTransaksi = unserialize($_SESSION['transaksi']);
            $this->nextId = $this->getMaxTransaksiId() + 1;
        } else {
            // $this->initializeDefaultTransaksi();
        }
    }


    public function addTransaksi($user_id, $kasir_name, $detail_transaksis)
    {
        $user = $this->modelUser->getUserById($user_id);
        //$kasir = $this->modelUser->getUserById($kasir_id);

        $transaksi_total = 0;
        foreach ($detail_transaksis as $detail) {
            $transaksi_total += $detail->detail_subtotal;
        }

        $transaksi = new Transaksi($this->nextId, $user, $kasir_name, $transaksi_total, $detail_transaksis);

        foreach ($detail_transaksis as $detail) {
            $barang_id = $detail->barang->barang_id;
            $barang = $this->modelBarang->getBarangById($barang_id);

            if (!$barang) {
                echo "Barang dengan ID " . $barang_id . " tidak ditemukan.<br>";
                continue; 
            }
            $detailObj = new DetailTransaksi($transaksi->transaksi_id, $barang, $detail->detail_jumlah, $detail->detail_subtotal);
            $transaksi->detail_transaksi[] = $detailObj;

            $this->modelDetail->addDetailTransaksi($detail->barang->barang_id, $detail->detail_jumlah);
        }

        $this->modelTransaksi[] = $transaksi;

        $this->saveToSession();
    }




    public function saveToSession()
    {
        $_SESSION['transaksi'] = serialize($this->modelTransaksi);
    }

    public function getAllTransaksi()
    {
        return $this->modelTransaksi;
        
    }

    public function getMaxTransaksiId()
    {
        $maxId = 0;
        foreach ($this->modelTransaksi as $transaksi) {
            if ($transaksi->transaksi_id > $maxId) {
                $maxId = $transaksi->transaksi_id;
            }
        }
        return $maxId;
    }
}