<?php
require_once 'node_detail_transaksi.php';
require_once 'node_user.php';

class Transaksi
{
    public $transaksi_id;
    public $user;
    public $transaksi_total;
    public $kasir;
    public $detail_transaksi;
    // public $detail_id;
    // public $barang;
    // public $detail_jumlah;
    // public $detail_subtotal;

    public function __construct($transaksi_id, $user, $kasir ,$transaksi_total ,$detail_transaksi)
    {
        $this->transaksi_id = $transaksi_id;
        $this->user = $user;
        $this->transaksi_total = $transaksi_total;
        $this->kasir = $kasir;
        $this->detail_transaksi = $detail_transaksi;
        // $this->detail_id = $detail_id;
        // $this->barang = $barang;
        // $this->detail_jumlah = $detail_jumlah;
        // $this->detail_subtotal = $detail_subtotal;
    }
}