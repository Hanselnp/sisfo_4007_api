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

        $id_pemasukan = $this->get('id_pemasukan');
        $id_pegawai = $this->get('idpegawai');

        //add all function
        if ($id_pemasukan != '') {
            if ($id_pemasukan == 'all') {
              $telkomdb = $this->db->get('finance')->result();
            } else {
              $this->db->where('id_pemasukan', $id_pemasukan);
              $telkomdb = $this->db->get('finance')->result();
            }
        } elseif ($id_pegawai != '') {
            if ($id_pegawai == 'all') {
              $telkomdb = $this->db->get('pegawai')->result();
              $telkomdb = $this->db->get('gaji')->result();
            } else {
              $this->db->where('idpegawai', $id_pegawai);
              $telkomdb = $this->db->get('pegawai')->result();
              $telkomdb = $this->db->get('gaji')->result();
            }
        $this->response($telkomdb, 200);
    }

    //Mengirim atau menambah data telkomdb baru
    function index_post() {

      $dataFinance = array(
                  'id_pemasukan'           => $this->put('id_pemasukan'),
                  'blanko'   => $this->put('blanko'),
                  'tipe'    => $this->put('tipe'),
                  'keperluan'    => $this->put('keperluan'),
                  'tanggal'    => $this->put('tanggal'),
                  'debit'    => $this->put('debit'),
                  'kredit'    => $this->put('kredit')
      );
      $dataPegawai = array(
                  'idpegawai'           => $this->put('idpegawai'),
                  'namapegawai'   => $this->put('namapegawai'),
                  'genderpegawai'    => $this->put('genderpegawai'),
                  'emailpegawai'    => $this->put('emailpegawai'),
                  'statuspegawai'    => $this->put('statuspegawai'),
                  'gajipegawai'    => $this->put('gajipegawai')
      );


      if ($dataFinance != '') {
          $insert = $this->db->insert('finance', $dataFinance);
      } elseif ($dataPegawai != '') {
          $insert = $this->db->insert('pegawai', $dataPegawai);
      }
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data telkomdb yang telah ada
    function index_put() {

        $id_pemasukan = $this->put('id_pemasukan');
        $id_pegawai = $this->put('idpegawai');
        $id_absen = $this->put('id_absen');


        $dataFinance = array(
                    'id_pemasukan'           => $this->put('id_pemasukan'),
                    'blanko'   => $this->put('blanko'),
                    'tipe'    => $this->put('tipe'),
                    'keperluan'    => $this->put('keperluan'),
                    'tanggal'    => $this->put('tanggal'),
                    'debit'    => $this->put('debit'),
                    'kredit'    => $this->put('kredit')
        );
        $dataPegawai = array(
                    'idpegawai'           => $this->put('idpegawai'),
                    'namapegawai'   => $this->put('namapegawai'),
                    'genderpegawai'    => $this->put('genderpegawai'),
                    'emailpegawai'    => $this->put('emailpegawai'),
                    'statuspegawai'    => $this->put('statuspegawai'),
                    'gajipegawai'    => $this->put('gajipegawai')
        );
                  if ($dataFinance != '') {
                      $this->db->where('id_pemasukan', $id_pemasukan);
                      $update = $this->db->update('finance', $dataFinance);
                  } elseif ($dataPegawai != '') {
                      $this->db->where('idpegawai', $id_pegawai);
                      $update = $this->db->update('pegawai', $dataPegawai);
                  }
                  }
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data telkomdb
    function index_delete() {

        $id_pemasukan = $this->delete('id_pemasukan');
        $id_pegawai = $this->delete('idpegawai');


        if ($id_pemasukan != '') {
            $this->db->where('id_pemasukan', $id_pemasukan);
            $delete = $this->db->delete('finance');
        } elseif ($id_pegawai != '') {
            $this->db->where('idpegawai', $id_pegawai);
            $delete = $this->db->delete('pegawai');
        }
        
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
