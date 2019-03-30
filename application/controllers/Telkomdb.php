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
        $id = $this->get('id');
        if ($id == '') {
            $telkomdb = $this->db->get('login')->result();
        } else {
            $this->db->where('id', $id);
            $telkomdb = $this->db->get('login')->result();
        }
        $this->response($telkomdb, 200);
    }

    //Mengirim atau menambah data telkomdb baru
    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'first_name'   => $this->post('first_name'),
                    'last_name'    => $this->post('last_name'),
                    'username'    => $this->post('username'),
                    'password'    => $this->post('password'),
                    'email'    => $this->post('email'),
                    'staff_id'    => $this->post('staff_id'),
                    'profile_pic'    => $this->post('rpofile_pic')
                  );
        $insert = $this->db->insert('login', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data telkomdb yang telah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'           => $this->post('id'),
                    'first_name'   => $this->post('first_name'),
                    'last_name'    => $this->post('last_name'),
                    'username'    => $this->post('username'),
                    'password'    => $this->post('password'),
                    'email'    => $this->post('email'),
                    'staff_id'    => $this->post('staff_id'),
                    'profile_pic'    => $this->post('rpofile_pic')
                  );
        $this->db->where('id', $id);
        $update = $this->db->update('login', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data telkomdb
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('login');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
