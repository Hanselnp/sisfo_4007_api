<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Itsupport extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function getPelanggan($id_pelanggan = '', $limit = '') {
      if ($id_pelanggan == '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->order_by('id_pelanggan', 'DESC');
          return $this->response($this->db->get('pelanggan')->result(), 200);
        } else {
          return $this->response($this->db->get('pelanggan')->result(), 200);
        }
      } else if ($id_pelanggan != '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->where('id_pelanggan', $id_pelanggan);
          $this->db->order_by('nama', 'ASC');
          return $this->response($this->db->get('pelanggan')->result(), 200);
        } else {
          $this->db->where('id_pelanggan', $id_pelanggan);
          return $this->response($this->db->get('pelanggan')->result(), 200);
        }
      }
    }

    function getKomplain($id_komplain = '', $limit = '') {
      if ($id_komplain == '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->order_by('id_komplain', 'DESC');
          return $this->response($this->db->get('komplain')->result(), 200);
        } else {
          return $this->response($this->db->get('komplain')->result(), 200);
        }
      } else if ($id_komplain != '') {
        if ($limit != '') {
          $this->db->limit($limit);
          $this->db->where('id_komplain', $id_komplain);
          $this->db->order_by('nama', 'ASC');
          return $this->response($this->db->get('komplain')->result(), 200);
        } else {
          $this->db->where('id_komplain', $id_komplain);
          return $this->response($this->db->get('komplain')->result(), 200);
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

    //Menampilkan data telkomdb
    function index_get() {
      $param = $this->get('param');
      if ($param == 'get_pelanggan') {
        $id_pelanggan = $this->get('id_pelanggan');
        $limit = $this->get('limit');
        return $this->getPelanggan($id_pelanggan, $limit);
      } else if ($param == 'get_komplain') {
        $id_komplain = $this->get('id_komplain');
        $limit = $this->get('limit');
        return $this->getKomplain($id_komplain, $limit);
      } else if ($param == 'get_status') {
        $id_sp = $this->get('id_sp');
        $limit = $this->get('limit');
        return $this->getStatusPemasangan($id_sp, $limit);
      }
        $id_komplain = $this->get('id_komplain');
        $id_sp = $this->get('id_sp');
        $id_pelanggan = $this->get('id_pelanggan');

        //add all function
        if ($id_komplain != '') {
            if ($id_komplain == 'all') {
              $telkomdb = $this->db->get('komplain')->result();
            } else {
              $this->db->where('id_komplain', $id_komplain);
              $telkomdb = $this->db->get('komplain')->result();
            }
        } elseif ($id_sp != '') {
            if ($id_sp == 'all') {
              $telkomdb = $this->db->get('status_pemasangan')->result();
            } else {
              $this->db->where('id_sp', $id_sp);
              $telkomdb = $this->db->get('status_pemasangan')->result();
            }
        } elseif ($id_pelanggan != '') {
            if ($id_pelanggan == 'all') {
              $telkomdb = $this->db->get('pelanggan')->result();
            } else {
              $this->db->where('id_pelanggan', $id_pelanggan);
              $telkomdb = $this->db->get('pelanggan')->result();
            }
        }
        $this->response($telkomdb, 200);
    }

    //Mengirim atau menambah data telkomdb baru
    function index_post() {

      $dataKomplain = array(
                  'id_komplain'           => $this->put('id_komplain'),
                  'nama'   => $this->put('nama'),
                  'telepon'    => $this->put('telepon'),
                  'komplain'    => $this->put('komplain')
      );
      $dataSp = array(
                  'id_sp'           => $this->put('id_sp'),
                  'id_pelanggan'   => $this->put('id_pelanggan'),
                  'status_pemasangan'    => $this->put('status_pemasangan')
      );
      $dataPelanggan = array(
                  'id_pelanggan'           => $this->put('id_pelanggan'),
                  'nama'   => $this->put('nama'),
                  'telepon'    => $this->put('telepon'),
                  'alamat'    => $this->put('alamat'),
                  'status'    => $this->put('status')
      );
      if ($dataKomplain != '') {
          $insert = $this->db->insert('komplain', $dataKomplain);
      } elseif ($dataSp != '') {
          $insert = $this->db->insert('status_pemasangan', $dataSp);
      } elseif ($dataPelanggan != '') {
          $insert = $this->db->insert('pelanggan', $dataPelanggan);
      }

        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data telkomdb yang telah ada
    function index_put() {

        $id_komplain = $this->put('id_komplain');
        $id_sp = $this->put('id_sp');
        $id_pelanggan = $this->put('id_pelanggan');


        $dataKomplain = array(
                    'id_komplain'           => $this->put('id_komplain'),
                    'nama'   => $this->put('nama'),
                    'telepon'    => $this->put('telepon'),
                    'komplain'    => $this->put('komplain')
        );
        $dataSp = array(
                    'id_sp'           => $this->put('id_sp'),
                    'id_pelanggan'   => $this->put('id_pelanggan'),
                    'status_pemasangan'    => $this->put('status_pemasangan')
        );
        $dataPelanggan = array(
                    'id_pelanggan'           => $this->put('id_pelanggan'),
                    'nama'   => $this->put('nama'),
                    'telepon'    => $this->put('telepon'),
                    'alamat'    => $this->put('alamat'),
                    'status'    => $this->put('status')
        );

                  // } elseif ($dataKomplain != '') {
                  //     $this->db->where('id_komplain', $id_komplain);
                  //     $update = $this->db->update('komplain', $dataKomplain);
                  // } elseif ($dataSp != '') {
                  //     $this->db->where('id_sp', $id_sp);
                  //     $update = $this->db->update('status_pemasangan', $dataSp);
                  // } elseif ($dataPelanggan != '') {
                  //     $this->db->where('id_pelanggan', $id_pelanggan);
                  //     $update = $this->db->update('pelanggan', $dataPelanggan);
                  // }

        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data telkomdb
    function index_delete() {

        $id_komplain = $this->delete('id_komplain');
        $id_sp = $this->delete('id_sp');
        $id_pelanggan = $this->delete('id_pelanggan');

      if ($id_komplain != '') {
            $this->db->where('id_komplain', $id_komplain);
            $delete = $this->db->delete('komplain');
        } elseif ($id_sp != '') {
            $this->db->where('id_sp', $id_sp);
            $delete = $this->db->delete('status_pemasangan');
        } elseif ($id_pelanggan != '') {
            $this->db->where('id_pelanggan', $id_pelanggan);
            $delete = $this->db->delete('pelanggan');
        }
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
