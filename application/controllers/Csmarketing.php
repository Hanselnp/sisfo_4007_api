<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Csmarketing extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    public function getBanner() {
      return $this->response($this->db->get('banner')->result(), 200);
    }

    public function getAbout()
    {
      return $this->response($this->db->get('about')->result(), 200);
    }

    public function getArticle()
    {
      return $this->response($this->db->get('article')->result(), 200);
    }

    //Menampilkan data telkomdb
    function index_get() {
      $param = $this->get('param');
      if ($param == "get_banner") {
        return $this->getBanner();
      } else if ($param == 'get_article') {
        return $this->getArticle();
      } else if ($param == 'get_about') {
        return $this->getAbout();
      }
        $id_about = $this->get('id_about');
        $id_article = $this->get('id_article');
        $id_banner = $this->get('id_banner');

        if ($id_about != '') {
            if ($id_about == 'all') {
              $telkomdb = $this->db->get('about')->result();
            } else {
              $this->db->where('id_about', $id_about);
              $telkomdb = $this->db->get('about')->result();
            }
        } elseif ($id_article != '') {
            if ($id_article == 'all') {
              $telkomdb = $this->db->get('article')->result();
            } else {
              $this->db->where('id_article', $id_article);
              $telkomdb = $this->db->get('article')->result();
            }
        } elseif ($id_banner != '') {
            if ($id_banner == 'all') {
              $telkomdb = $this->db->get('banner')->result();
            } else {
              $this->db->where('id_banner', $id_banner);
              $telkomdb = $this->db->get('banner')->result();
            }
        }
        $this->response($telkomdb, 200);
    }

    //Mengirim atau menambah data telkomdb baru
    function index_post() {

      $dataAbout = array(
                  'id_about'           => $this->put('id_about'),
                  'title'   => $this->put('title'),
                  'isi'    => $this->put('isi')
      );
      $dataArticle = array(
                  'id_article'           => $this->put('id_article'),
                  'title'   => $this->put('title'),
                  'isi'    => $this->put('isi')
      );
      $dataBanner = array(
                  'id_banner'           => $this->put('id_banner'),
                  'title'   => $this->put('title'),
                  'isi'    => $this->put('isi')
      );

      if ($dataAbout != '') {
          $insert = $this->db->insert('about', $dataAbout);
      } elseif ($dataArticle != '') {
          $insert = $this->db->insert('article', $dataArticle);
      } elseif ($dataBanner != '') {
          $insert = $this->db->insert('banner', $dataBanner);
      }

        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data telkomdb yang telah ada
    function index_put() {
        $id_about = $this->put('id_about');
        $id_article = $this->put('id_article');
        $id_banner = $this->put('id_banner');


        $dataAbout = array(
                    'id_about'           => $this->put('id_about'),
                    'title'   => $this->put('title'),
                    'isi'    => $this->put('isi')
        );
        $dataArticle = array(
                    'id_article'           => $this->put('id_article'),
                    'title'   => $this->put('title'),
                    'isi'    => $this->put('isi')
        );
        $dataBanner = array(
                    'id_banner'           => $this->put('id_banner'),
                    'title'   => $this->put('title'),
                    'isi'    => $this->put('isi')
        );

        if ($dataAbout != '') {
            $this->db->where('id_about', $id_about);
            $update = $this->db->update('about', $dataAbout);
        } elseif ($dataArticle != '') {
            $this->db->where('id_article', $id_article);
            $update = $this->db->update('article', $dataArticle);
        } elseif ($dataBanner != '') {
            $this->db->where('id_banner', $id_banner);
            $update = $this->db->update('banner', $dataBanner);
        }
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data telkomdb
    function index_delete() {

        $id_about = $this->delete('id_about');
        $id_article = $this->delete('id_article');
        $id_banner = $this->delete('id_banner');

        if ($id_about != '') {
            $this->db->where('id_about', $id_about);
            $delete = $this->db->delete('about');
        } elseif ($id_article != '') {
            $this->db->where('id_article', $id_article);
            $delete = $this->db->delete('article');
        } elseif ($id_banner != '') {
            $this->db->where('id_banner', $id_banner);
            $delete = $this->db->delete('banner');
        }

        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
