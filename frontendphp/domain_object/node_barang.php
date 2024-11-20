<?php
class barang{
    public $barang_id;
    public $barang_name;

    public $barang_stock;

    public $barang_harga;

    function __construct($barang_id,$barang_name,$barang_stock,$barang_harga){
          $this->barang_id = $barang_id;
          $this->barang_name = $barang_name;
          $this->barang_stock = $barang_stock;
          $this->barang_harga = $barang_harga;
    }
}

