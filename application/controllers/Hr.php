<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Hr extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
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

    function getAbsen($id_absen = '', $limit = '') {
      if ($id_absen == '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->order_by('id_absen', 'DESC');
          return $this->response($this->db->get('absensi')->result(), 200);
        } else {
          return $this->response($this->db->get('absensi')->result(), 200);
        }
      } else if ($id_absen != '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->where('id_absen', $id_absen);
          $this->db->order_by('id_absen', 'DESC');
          return $this->response($this->db->get('absensi')->result(), 200);
        } else {
          $this->db->where('id_absen', $id_absen);
          return $this->response($this->db->get('absensi')->result(), 200);
        }
      }
    }

    function getStatusPemasangan($id_sp = '', $limit = '') {
      if ($id_sp == '') {
        if ($limit != '') {
          $this->db->join('pelanggan', 'status_pemasangan.id_pelanggan = pelanggan.id_pelanggan');
          $this->db->limit($limit);
          $this->db->order_by('id_sp', 'DESC');
          return $this->response($this->db->get('status_pemasangan')->result(), 200);
        } else {
          $this->db->join('pelanggan', 'status_pemasangan.id_pelanggan = pelanggan.id_pelanggan');
          return $this->response($this->db->get('status_pemasangan')->result(), 200);
        }
      } else if ($id_sp != '') {
        if ($limit != '') {
          $this->db->join('pelanggan', 'status_pemasangan.id_pelanggan = pelanggan.id_pelanggan');
          $this->db->limit($limit);
          $this->db->where('id_sp', $id_barang);
          $this->db->order_by('id_sp', 'DESC');
          return $this->response($this->db->get('status_pemasangan')->result(), 200);
        } else {
          $this->db->join('pelanggan', 'status_pemasangan.id_pelanggan = pelanggan.id_pelanggan');
          $this->db->where('id_sp', $id_barang);
          return $this->response($this->db->get('status_pemasangan')->result(), 200);
        }
      }
    }

    function getKaryawan($id_karyawan = '', $limit = '') {
      if ($id_karyawan == '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->order_by('id_karyawan', 'DESC');
          return $this->response($this->db->get('karyawan')->result(), 200);
        } else {
          return $this->response($this->db->get('karyawan')->result(), 200);
        }
      } else if ($id_karyawan != '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->where('id_karyawan', $id_karyawan);
          $this->db->order_by('id_karyawan', 'DESC');
          return $this->response($this->db->get('karyawan')->result(), 200);
        } else {
          $this->db->where('id_karyawan', $id_karyawan);
          return $this->response($this->db->get('karyawan')->result(), 200);
        }
      }
    }

    function getSdm() {
      $id_sdm = $this->get('id_sdm');
      if ($id_sdm == '') {
        return $this->response($this->db->get('sdm')->result(), 200);
      } else {
        $this->db->where('id_sdm', $id_sdm);
        return $this->response($this->db->get('sdm')->result(), 200);
      }
    }

    //Menampilkan data telkomdb
    function index_get() {
        $param = $this->get('param');
        if ($param == 'get_pegawai') {
          $id_pagawai = $this->get('idPegawai');
          $limit = $this->get('limit');
          return $this->getPegawai($id_pagawai, $limit);
        } else if ($param == 'get_absen') {
          $id_absen = $this->get('id_absen');
          $limit = $this->get('limit');
          return $this->getAbsen($id_absen, $limit);
        } else if ($param == 'get_status') {
          $id_sp = $this->get('id_sp');
          $limit = $this->get('limit');
          return $this->getStatusPemasangan($id_sp, $limit);
        } else if ($param == 'get_karyawan') {
          $id_karyawan = $this->get('id_karyawan');
          $limit = $this->get('limit');
          return $this->getKaryawan($id_karyawan, $limit);
        } else if ($param == 'get_sdm') {
          return $this->getSdm();
        }
        $id_pegawai = $this->get('idpegawai');
        $id_absen = $this->get('id_absen');
        $id_status = $this->get('id_status');
        $id_karyawan = $this->get('id_karyawan');
        $id_sdm = $this->get('id_sdm');

        //add all function

    }

    //Mengirim atau menambah data telkomdb baru
    function index_post() {

      $dataPegawai = array(
                  'idpegawai'           => $this->put('idpegawai'),
                  'namapegawai'   => $this->put('namapegawai'),
                  'genderpegawai'    => $this->put('genderpegawai'),
                  'emailpegawai'    => $this->put('emailpegawai'),
                  'statuspegawai'    => $this->put('statuspegawai'),
                  'gajipegawai'    => $this->put('gajipegawai')
      );
      $dataAbsen = array(
                  'id_absen'           => $this->put('id_absen'),
                  'jabatan'   => $this->put('jabatan'),
                  'tanggal'    => $this->put('tanggal'),
                  'bulan'    => $this->put('bulan'),
                  'persentase'    => $this->put('persentase')
      );
      $dataStatus = array(
                  'id_status'           => $this->put('id_status'),
                  'jumlah_pecat'   => $this->put('jumlah_pecat'),
                  'bulan'    => $this->put('bulan'),
                  'jumlah'    => $this->put('jumlah_baru')
      );
      $dataKaryawan = array(
                  'id_karyawan'           => $this->put('id_karyawan'),
                  'nama_karyawan'   => $this->put('nama_karyawan'),
                  'umur'    => $this->put('umur')
      );
      $dataSdm = array(
                  'id_sdm'           => $this->put('id_sdm'),
                  'nama_divisi'   => $this->put('nama_divisi'),
                  'jumlah_karyawan'    => $this->put('jumlah_karyawan'),
                  'Aktivitas'    => $this->put('Aktivitas'),
                  'Solidaritas'    => $this->put('Solidaritas'),
                  'Output'    => $this->put('Output'),
                  'Performansi'    => $this->put('Performansi'),
                  'lainnya'    => $this->put('lainnya')
      );

      $param = $this->get('param');

      if ($param == 'post_pegawai') {
          $insert = $this->db->insert('pegawai', $dataPegawai);
      } elseif ($param == 'post_absen') {
          $insert = $this->db->insert('absensi', $dataAbsen);
      } elseif ($param == 'post_status_pemasangan') {
          $insert = $this->db->insert('status_karyawan', $dataStatus);
      } elseif ($param == 'post_karyawan') {
          $insert = $this->db->insert('karyawan', $dataKaryawan);
      } elseif ($param == 'post_sdm') {
          $insert = $this->db->insert('sdm', $dataSdm);
      }

        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data telkomdb yang telah ada
    function index_put() {

        $id_pegawai = $this->put('idpegawai');
        $id_absen = $this->put('id_absen');
        $id_status = $this->put('id_status');
        $id_karyawan = $this->put('id_karyawan');
        $id_sdm = $this->put('id_sdm');


        $dataPegawai = array(
                    'idpegawai'           => $this->put('idpegawai'),
                    'namapegawai'   => $this->put('namapegawai'),
                    'genderpegawai'    => $this->put('genderpegawai'),
                    'emailpegawai'    => $this->put('emailpegawai'),
                    'statuspegawai'    => $this->put('statuspegawai'),
                    'gajipegawai'    => $this->put('gajipegawai')
        );
        $dataAbsen = array(
                    'id_absen'           => $this->put('id_absen'),
                    'jabatan'   => $this->put('jabatan'),
                    'tanggal'    => $this->put('tanggal'),
                    'bulan'    => $this->put('bulan'),
                    'persentase'    => $this->put('persentase')
        );
        $dataStatus = array(
                    'id_status'           => $this->put('id_status'),
                    'jumlah_pecat'   => $this->put('jumlah_pecat'),
                    'bulan'    => $this->put('bulan'),
                    'jumlah'    => $this->put('jumlah_baru')
        );
        $dataKaryawan = array(
                    'id_karyawan'           => $this->put('id_karyawan'),
                    'nama_karyawan'   => $this->put('nama_karyawan'),
                    'umur'    => $this->put('umur')
        );
        $dataSdm = array(
                    'id_sdm'           => $this->put('id_sdm'),
                    'nama_divisi'   => $this->put('nama_divisi'),
                    'jumlah_karyawan'    => $this->put('jumlah_karyawan'),
                    'Aktivitas'    => $this->put('Aktivitas'),
                    'Solidaritas'    => $this->put('Solidaritas'),
                    'Output'    => $this->put('Output'),
                    'Performansi'    => $this->put('Performansi'),
                    'lainnya'    => $this->put('lainnya')
        );
                if ($dataPegawai != '') {
                      $this->db->where('idpegawai', $id_pegawai);
                      $update = $this->db->update('pegawai', $dataPegawai);
                  } elseif ($dataAbsen != '') {
                      $this->db->where('id_absen', $id_absen);
                      $update = $this->db->update('absensi', $dataAbsen);
                  } elseif ($dataStatus != '') {
                      $this->db->where('id_status', $dataStatus);
                      $update = $this->db->update('status_karyawan', $dataStatus);
                  } elseif ($dataKaryawan != '') {
                      $this->db->where('id_karyawan', $id_karyawan);
                      $update = $this->db->update('karyawan', $dataKaryawan);
                  } elseif ($dataSdm != '') {
                      $this->db->where('id_sdm', $id_sdm);
                      $update = $this->db->update('sdm', $dataSdm);
                  }
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data telkomdb
    function index_delete() {

        $id_pegawai = $this->delete('idpegawai');
        $id_absen = $this->delete('id_absen');
        $id_status = $this->delete('id_status');
        $id_karyawan = $this->delete('id_karyawan');
        $id_sdm = $this->delete('id_sdm');

        if ($id_pegawai != '') {
            $this->db->where('idpegawai', $id_pegawai);
            $delete = $this->db->delete('pegawai');
        } elseif ($id_absen != '') {
            $this->db->where('id_absen', $id_absen);
            $delete = $this->db->delete('absensi');
        } elseif ($id_status != '') {
            $this->db->where('id_status', $id_status);
            $delete = $this->db->delete('status_karyawan');
        } elseif ($id_karyawan != '') {
            $this->db->where('id_karyawan', $id_karyawan);
            $delete = $this->db->delete('karyawan');
        } elseif ($id_sdm != '') {
            $this->db->where('id_sdm', $id_sdm);
            $delete = $this->db->delete('sdm');
        }
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
