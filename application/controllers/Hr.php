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

        $id_pegawai = $this->get('idpegawai');
        $id_absen = $this->get('id_absen');
        $id_status = $this->get('id_status');
        $id_karyawan = $this->get('id_karyawan');
        $id_sdm = $this->get('id_sdm');

        //add all function
        if ($id_pegawai != '') {
            if ($id_pegawai == 'all') {
              $telkomdb = $this->db->get('pegawai')->result();
              $telkomdb = $this->db->get('gaji')->result();
            } else {
              $this->db->where('idpegawai', $id_pegawai);
              $telkomdb = $this->db->get('pegawai')->result();
              $telkomdb = $this->db->get('gaji')->result();
            }
        } elseif ($id_absen != '') {
            if ($id_absen == 'all') {
              $telkomdb = $this->db->get('absensi')->result();
            } else {
              $this->db->where('id_absen', $id_absen);
              $telkomdb = $this->db->get('absensi')->result();
            }
        } elseif ($id_status != '') {
            if ($id_status == 'all') {
              $telkomdb = $this->db->get('status_karyawan')->result();
            } else {
              $this->db->where('id_status', $id_status);
              $telkomdb = $this->db->get('status_karyawan')->result();
            }
        } elseif ($id_karyawan != '') {
            if ($id_karyawan == 'all') {
              $telkomdb = $this->db->get('karyawan')->result();
            } else {
              $this->db->where('id_karyawan', $id_karyawan);
              $telkomdb = $this->db->get('karyawan')->result();
            }
        } elseif ($id_sdm != '') {
            if ($id_sdm == 'all') {
              $telkomdb = $this->db->get('sdm')->result();
            } else {
              $this->db->where('id_sdm', $id_sdm);
              $telkomdb = $this->db->get('sdm')->result();
            }
        }
        $this->response($telkomdb, 200);
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

      if ($dataPegawai != '') {
          $insert = $this->db->insert('pegawai', $dataPegawai);
      } elseif ($dataAbsen != '') {
          $insert = $this->db->insert('absensi', $dataAbsen);
      } elseif ($dataStatus != '') {
          $insert = $this->db->insert('status_karyawan', $dataStatus);
      } elseif ($dataKaryawan != '') {
          $insert = $this->db->insert('karyawan', $dataKaryawan);
      } elseif ($dataSdm != '') {
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
