<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Finance extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function getFinance($id_pemasukan = '', $limit = '') {
      if ($id_pemasukan == '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->order_by('id_pemasukan', 'DESC');
          return $this->response($this->db->get('finance')->result(), 200);
        } else {
          return $this->response($this->db->get('finance')->result(), 200);
        }
      } else if ($id_pemasukan != '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->where('id_pemasukan', $id_pemasukan);
          $this->db->order_by('id_pemasukan', 'DESC');
          return $this->response($this->db->get('finance')->result(), 200);
        } else {
          $this->db->where('id_pemasukan', $id_pemasukan);
          return $this->response($this->db->get('finance')->result(), 200);
        }
      }
    }

    function getPegawai($id_pegawai = '', $limit = '') {
      if ($id_pegawai == '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->order_by('id_komplain_nonmarket', 'DESC');
          return $this->response($this->db->get('pegawai')->result(), 200);
        } else {
          return $this->response($this->db->get('pegawai')->result(), 200);
        }
      } else if ($id_pegawai != '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->where('id_komplain_nonmarket', $id_pegawai);
          $this->db->order_by('id_komplain_nonmarket', 'DESC');
          return $this->response($this->db->get('pegawai')->result(), 200);
        } else {
          $this->db->where('id_komplain_nonmarket', $id_pegawai);
          return $this->response($this->db->get('pegawai')->result(), 200);
        }
      }
    }

    //Menampilkan data telkomdb
    function index_get() {
        $param = $this->get('param');
        if ($param == 'get_pemasukan') {
          $id_pemasukan = $this->get('id_pemasukan');
          $limit = $this->get('limit');
          return $this->getFinance($id_pemasukan, $limit);
        } else if ($param == 'get_pegawai') {
          $id_pagawai = $this->get('idPegawai');
          $limit = $this->get('limit');
          return $this->getPegawai($id_pagawai, $limit);
         }
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

      $param = $this->get('param');

      if ($param == 'post_finance') {
          $insert = $this->db->insert('finance', $dataFinance);
      } elseif ($param == 'post_pegawai') {
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
