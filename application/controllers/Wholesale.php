<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Wholesale extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function getKategori() {
      $id_kategori = $this->get('id_kategori');
      if ($id_kategori == '') {
        return $this->response($this->db->get('kategori')->result(), 200);
      } else {
        $this->db->where('id_k  ategori', $id_kategori);
        return $this->response($this->db->get('kategori')->result(), 200);
      }
    }

    function getSupplier($id_supplier = '', $limit = '') {
      if ($id_supplier == '') {
        if ($limit !=  '') {
          $this->db->limit($limit);
          $this->db->order_by('idSupplier', 'DESC');
          return $this->response($this->db->get('supplier')->result(), 200);
        } else {
          return $this->response($this->db->get('supplier')->result(), 200);
        }
      } else if ($id_supplier != '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->where('idSupplier', $id_supplier);
          $this->db->order_by('idSupplier', 'DESC');
          return $this->response($this->db->get('supplier')->result(), 200);
        } else {
          $this->db->where('idSupplier', $id_supplier);
          return $this->response($this->db->get('supplier')->result(), 200);
        }
      }
    }

    function getInventory($id_barang = '', $limit = '') {
      if ($id_barang == '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->order_by('idBarang', 'DESC');
          return $this->response($this->db->get('inventory')->result(), 200);
        } else {
          return $this->response($this->db->get('inventory')->result(), 200);
        }
      } else if ($id_barang != '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->where('idBarang', $id_barang);
          $this->db->order_by('idBarang', 'DESC');
          return $this->response($this->db->get('inventory')->result(), 200);
        } else {
          $this->db->where('idBarang', $id_barang);
          return $this->response($this->db->get('inventory')->result(), 200);
        }
      }
    }

    //Menampilkan data telkomdb
    function index_get() {

      $param = $this->get('param');
      if ($param == 'get_kategori') {
        $id_Kategori = $this->get('idKategori');
        $limit = $this->get('limit');
        return $this->getKategori($id_Kategori, $limit);
      } else if ($param == 'get_supplier') {
        $id_supplier = $this->get('idSupplier');
        $limit = $this->get('limit');
        return $this->getSupplier($id_supplier, $limit);
      } else if ($param == 'get_inventory') {
        $id_barang = $this->get('id_inventory');
        $limit = $this->get('limit');
        return $this->getInventory($id_barang, $limit);
      }
    }

    //Mengirim atau menambah data telkomdb baru
    function index_post() {

      $dataKategori = array(
                  'idKategori'           => $this->put('idKategori'),
                  'namaKategori'   => $this->put('namaKategori'),
                  'keterangan'    => $this->put('keterangan')
      );
      $dataSupplier = array(
                  'idSupplier'           => $this->put('idSupplier'),
                  'namaSupplier'   => $this->put('namaSupplier'),
                  'deskripsi'    => $this->put('deskripsi'),
                  'idKategori'    => $this->put('idKategori')
      );
      $dataBarang = array(
                  'idBarang'           => $this->put('idBarang'),
                  'namabarang'   => $this->put('namaBarang'),
                  'stockBarang'    => $this->put('stockBarang'),
                  'idSupplier'    => $this->put('idSupplier'),
                  'keterangan'    => $this->put('keterangan'),
                  'komplain'    => $this->put('komplain')
      );

      $param = $this->get('param');

      if ($param == 'post_kategori') {
        $insert = $this->db->insert('kategori', $dataKategori);
      } elseif ($param == 'post_supplier') {
          $insert = $this->db->insert('supplier', $dataSupplier);
      } elseif ($param == 'post_inventoriy') {
          $insert = $this->db->insert('inventory', $dataBarang);
      }

        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data telkomdb yang telah ada
    function index_put() {

        $idKategori = $this->put('idKategori');
        $idSupplier = $this->put('idSupplier');
        $idBarang = $this->put('idBarang');



        $dataKategori = array(
                    'idKategori'           => $this->put('idKategori'),
                    'namaKategori'   => $this->put('namaKategori'),
                    'keterangan'    => $this->put('keterangan')
        );
        $dataSupplier = array(
                    'idSupplier'           => $this->put('idSupplier'),
                    'namaSupplier'   => $this->put('namaSupplier'),
                    'deskripsi'    => $this->put('deskripsi'),
                    'idKategori'    => $this->put('idKategori')
        );
        $dataBarang = array(
                    'idBarang'           => $this->put('idBarang'),
                    'namabarang'   => $this->put('namaBarang'),
                    'stockBarang'    => $this->put('stockBarang'),
                    'idSupplier'    => $this->put('idSupplier'),
                    'keterangan'    => $this->put('keterangan'),
                    'komplain'    => $this->put('komplain')
        );
                  if ($dataKategori != '') {
                      $this->db->where('idKategori', $idKategori);
                      $update = $this->db->update('kategori', $dataKategori);
                  } elseif ($dataSupplier != '') {
                      $this->db->where('idSupplier', $idSupplier);
                      $update = $this->db->update('supplier', $dataSupplier);
                  } elseif ($dataBarang != '') {
                      $this->db->where('idBarang', $idBarang);
                      $update = $this->db->update('inventory', $dataBarang);
                  }
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data telkomdb
    function index_delete() {

        $idKategori = $this->delete('idKategori');
        $idSupplier = $this->delete('idSupplier');
        $idBarang = $this->delete('idBarang');



        if ($idKategori != '') {
            $this->db->where('idKategori', $idKategori);
            $delete = $this->db->delete('kategori');
        } elseif ($idSupplier != '') {
            $this->db->where('idSupplier', $idSupplier);
            $delete = $this->db->delete('supplier');
        } elseif ($idBarang != '') {
            $this->db->where('idBarang', $idBarang);
            $delete = $this->db->delete('inventory');
        }
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
