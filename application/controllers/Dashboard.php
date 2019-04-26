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
        $id_sdm = $this->get('id_sdm');
        $id_pemesanan = $this->get('id_pemesanan');
        $idTagihan = $this->get('idTagihan');
        $idBarang = $this->get('idBarang');
        $id_sp = $this->get('id_sp');



        //add all function
        if ($id_pemesanan != '') {
            if ($id_pemesanan = 'all') {
              $telkomdb = $this->db->get('pemesanan')->result();
            } else {
              $this->db->where('id_pemesanan', $id_pemesanan);
              $telkomdb = $this->db->get('pemesanan')->result();
            }
        } elseif ($id_sp != '') {
            if ($id_sp == 'all') {
              $telkomdb = $this->db->get('status_pemasangan')->result();
            } else {
              $this->db->where('id_sp', $id_sp);
              $telkomdb = $this->db->get('status_pemasangan')->result();
            }
        } elseif ($idTagihan != '') {
            if ($idTagihan == 'all') {
              $telkomdb = $this->db->get('tagihan')->result();
            } else {
              $this->db->where('idTagihan', $idTagihan);
              $telkomdb = $this->db->get('tagihan')->result();
            }
        } elseif ($idBarang != '') {
            if ($idBarang == 'all') {
              $telkomdb = $this->db->get('inventory')->result();
            } else {
              $this->db->where('idBarang', $idBarang);
              $telkomdb = $this->db->get('inventory')->result();
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
      $dataSp = array(
                  'id_sp'           => $this->put('id_sp'),
                  'id_pelanggan'   => $this->put('id_pelanggan'),
                  'status_pemasangan'    => $this->put('status_pemasangan')
      );
      $dataTagihan = array(
                  'idTagihan'           => $this->put('idTagihan'),
                  'Nama'   => $this->put('Nama'),
                  'Tagihan'    => $this->put('no_identitas')
      );
      $dataBarang = array(
                  'idBarang'           => $this->put('idBarang'),
                  'namabarang'   => $this->put('namaBarang'),
                  'stockBarang'    => $this->put('stockBarang'),
                  'idSupplier'    => $this->put('idSupplier'),
                  'keterangan'    => $this->put('keterangan'),
                  'komplain'    => $this->put('komplain')
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

      if ($dataPemesanan != ''){
          $insert = $this->db->insert('pemesanan', $dataPemesanan);
      } elseif ($dataSp != '') {
          $insert = $this->db->insert('status_pemasangan', $dataSp);
      } elseif ($dataTagihan != '') {
          $insert = $this->db->insert('tagihan', $dataTagihan);
      } elseif ($dataBarang != '') {
          $insert = $this->db->insert('inventory', $dataBarang);
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
        $id_pemesanan = $this->put('id_pemesanan');
        $id_sp = $this->put('id_sp');
        $idTagihan = $this->put('idTagihan');
        $idBarang = $this->put('idBarang');
        $id_sdm = $this->put('id_sdm');

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
        $dataSp = array(
                    'id_sp'           => $this->put('id_sp'),
                    'id_pelanggan'   => $this->put('id_pelanggan'),
                    'status_pemasangan'    => $this->put('status_pemasangan')
        );
        $dataTagihan = array(
                    'idTagihan'           => $this->put('idTagihan'),
                    'Nama'   => $this->put('Nama'),
                    'Tagihan'    => $this->put('no_identitas')
        );
        $dataBarang = array(
                    'idBarang'           => $this->put('idBarang'),
                    'namabarang'   => $this->put('namaBarang'),
                    'stockBarang'    => $this->put('stockBarang'),
                    'idSupplier'    => $this->put('idSupplier'),
                    'keterangan'    => $this->put('keterangan'),
                    'komplain'    => $this->put('komplain')
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
                  if ($dataPemesanan != '') {
                      $this->db->where('id_pemesanan', $id_pemesanan);
                      $update = $this->db->update('pemesanan', $dataPemesanan);
                  } elseif ($dataSp != '') {
                      $this->db->where('id_sp', $id_sp);
                      $update = $this->db->update('status_pemasangan', $dataSp);
                  } elseif ($dataTagihan != '') {
                      $this->db->where('idTagihan', $idTagihan);
                      $update = $this->db->update('tagihan', $dataTagihan);
                  } elseif ($dataBarang != '') {
                      $this->db->where('idBarang', $idBarang);
                      $update = $this->db->update('inventory', $dataBarang);
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
        $id_pemesanan = $this->delete('id_pemesanan');
        $id_sp = $this->delete('id_sp');
        $idTagihan = $this->delete('idTagihan');
        $idBarang = $this->delete('idBarang');
        $id_sdm = $this->delete('id_sdm');


        if ($id_pemesanan != '') {
            $this->db->where('id_pemesanan', $id_pemesanan);
            $delete = $this->db->delete('pemesanan');
        } elseif ($id_sp != '') {
            $this->db->where('id_sp', $id_sp);
            $delete = $this->db->delete('status_pemasangan');
        } elseif ($idTagihan != '') {
            $this->db->where('idTagihan', $idTagihan);
            $delete = $this->db->delete('tagihan');
        } elseif ($idBarang != '') {
            $this->db->where('idBarang', $idBarang);
            $delete = $this->db->delete('inventory');
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
