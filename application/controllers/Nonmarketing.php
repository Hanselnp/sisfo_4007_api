<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Nonmarketing extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data telkomdb
    function index_get() {
        $id_pemesanan = $this->get('id_pemesanan');
        $id_komplain_nonmarket = $this->get('id_komplain_nonmarket');


        //add all function
        if ($id_pemesanan != '') {
            if ($id_pemesanan = 'all') {
              $telkomdb = $this->db->get('pemesanan')->result();
            } else {
              $this->db->where('id_pemesanan', $id_pemesanan);
              $telkomdb = $this->db->get('pemesanan')->result();
            }
        } elseif ($id_komplain_nonmarket != '') {
            if ($id_komplain_nonmarket == 'all') {
              $telkomdb = $this->db->get('komplain_nonmarket')->result();
            } else {
              $this->db->where('id_komplain_market', $id_komplain_nonmarket);
              $telkomdb = $this->db->get('komplain_nonmarket')->result();
            }
        $this->response($telkomdb, 200);
    }

    //Mengirim atau menambah data telkomdb baru
    function index_post() {
      $dataPemesanan = array(
                  'id_pemesanan'           => $this->put('id'),
                  'nama'   => $this->put('nama'),
                  'no_identitas'    => $this->put('no_identitas'),
                  'email'    => $this->put('email'),
                  'no_telp'    => $this->put('no_telp'),
                  'komplain'    => $this->put('komplain'),
                  'paket'    => $this->put('paket'),
                  'alamat'    => $this->put('alamat')
      );
      $dataNonKomplain = array(
                  'id_komplain_nonmarket'           => $this->put('id_komplain_nonmarket'),
                  'nama'   => $this->put('nama'),
                  'no_telp'    => $this->put('no_telp'),
                  'alamat'    => $this->put('alamat'),
                  'paket'    => $this->put('paket'),
                  'komplain'    => $this->put('komplain')
      );

      if ($dataPemesanan != '') {
          $insert = $this->db->insert('pemesanan', $dataPemesanan);
      } elseif ($dataNonKomplain != '') {
          $insert = $this->db->insert('komplain_nonmarket', $dataNonKomplain);
      }
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data telkomdb yang telah ada
    function index_put() {
        $id_pemesanan = $this->put('id_pemesanan');
        $id_komplain_nonmarket = $this->put('id_komplain_nonmarket');


        $dataPemesanan = array(
                    'id_pemesanan'           => $this->put('id'),
                    'nama'   => $this->put('nama'),
                    'no_identitas'    => $this->put('no_identitas'),
                    'email'    => $this->put('email'),
                    'no_telp'    => $this->put('no_telp'),
                    'komplain'    => $this->put('komplain'),
                    'paket'    => $this->put('paket'),
                    'alamat'    => $this->put('alamat')
        );
        $dataNonKomplain = array(
                    'id_komplain_nonmarket'           => $this->put('id_komplain_nonmarket'),
                    'nama'   => $this->put('nama'),
                    'no_telp'    => $this->put('no_telp'),
                    'alamat'    => $this->put('alamat'),
                    'paket'    => $this->put('paket'),
                    'komplain'    => $this->put('komplain')
        );
                  if ($dataPemesanan != '') {
                      $this->db->where('id_pemesanan', $id_pemesanan);
                      $update = $this->db->update('pemesanan', $dataPemesanan);
                  } elseif ($dataNonKomplain != '') {
                      $this->db->where('id_komplain_nonmarket', $id_komplain_nonmarket);
                      $update = $this->db->update('komplain_nonmarket', $dataNonKomplain);
                  }
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data telkomdb
    function index_delete() {

        $id_pemesanan = $this->delete('id_pemesanan');
        $id_komplain_nonmarket = $this->delete('id_komplain_nonmarket');


        if ($id_pemesanan != '') {
            $this->db->where('id_pemesanan', $id_pemesanan);
            $delete = $this->db->delete('pemesanan');
        } elseif ($id_komplain_nonmarket != '') {
            $this->db->where('id_komplain_nonmarket', $id_komplain_nonmarket);
            $delete = $this->db->delete('komplain_nonmarket');
        }
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
