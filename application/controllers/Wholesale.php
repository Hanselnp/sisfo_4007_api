<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Telkomdb extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data telkomdb
    function index_get() {
;
        $idKategori = $this->get('idKategori');
        $idSupplier = $this->get('idSupplier');
        $idBarang = $this->get('idBarang');


        //add all function
      eif ($idKategori != '') {
            if ($idKategori == 'all') {
              $telkomdb = $this->db->get('kategori')->result();
            } else {
              $this->db->where('idKategori', $id_Kategori);
              $telkomdb = $this->db->get('kategori')->result();
            }
        } elseif ($idSupplier != '') {
            if ($idSupplier == 'all') {
              $telkomdb = $this->db->get('supplier')->result();
            } else {
              $this->db->where('idSupplier', $idSupplier);
              $telkomdb = $this->db->get('supplier')->result();
            }
        } elseif ($idBarang != '') {
            if ($idBarang == 'all') {
              $telkomdb = $this->db->get('inventory')->result();
            } else {
              $this->db->where('idBarang', $idBarang);
              $telkomdb = $this->db->get('inventory')->result();
            }
        $this->response($telkomdb, 200);
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


      if ($dataKategori != '') {
          $insert = $this->db->insert('kategori', $dataKategori);
      } elseif ($dataSupplier != '') {
          $insert = $this->db->insert('supplier', $dataSupplier);
      } elseif ($dataBarang != '') {
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
