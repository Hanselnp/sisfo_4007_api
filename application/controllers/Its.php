<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Its extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('its_m');
	}

	public function index(){
		$this->load->view('it_support');
	}

	public function daftar_pelanggan(){
		$data['pelanggan'] = $this->its_m->getPelanggan();
		$this->load->view('daftar_pelanggan', $data);
	}

	public function komplain(){
		$data['komplain'] = $this->its_m->getKomplain();
		$this->load->view('komplain', $data);
	}

	public function editKomplain(){
		if(isset($_REQUEST)){
			$data = array(
				'nama' => $this->input->post('nama'),
				'telepon' => $this->input->post('telepon'),
				'komplain' => $this->input->post('komplain')
			);

			if($this->its_m->editKomplain($data, $this->input->post('id_komplain'))){
				redirect('/its/komplain');
			}
		}
	}

	public function status_pemasangan(){
		$data['status_pemasangan'] = $this->its_m->getStatusPemasangan();
		$this->load->view('status_pemasangan', $data);
	}

	public function tambahStatusPemasangan(){
		if(isset($_REQUEST)){
			$data = array(
				'id_sp'	=> $this->input->post('id_sp'),
				'id_pelanggan' => $this->input->post('id_pelanggan'),
				'status_pemasangan' => $this->input->post('status_pemasangan')
			);

			if($this->its_m->check_pelanggan($this->input->post('id_pelanggan'))<1){
				echo "<script>alert('ID Pelanggan tidak terdaftar'); window.location.href='status_pemasangan';</script>";
			} else if($this->its_m->tambahStatusPemasangan($data)){
				redirect('/its/status_pemasangan');
			}

		}
	}

	public function hapusStatusPemasangan($id){
		if(!empty($id)){
			$this->its_m->hapusStatusPemasangan($id);
		}
		redirect('/its/status_pemasangan');
	}

	public function editStatusPemasangan(){
		if(isset($_REQUEST)){
			$data = array(
				'status_pemasangan' => $this->input->post('status_pemasangan')
			);

			if($this->its_m->editStatusPemasangan($data, $this->input->post('id_sp'))){
				redirect('/its/status_pemasangan');
			}
		}
	}


	public function tambahPelanggan(){
		if(isset($_REQUEST)){
			$data = array(
				'id_pelanggan' => $this->input->post('id_pelanggan'),
				'nama' => $this->input->post('nama'),
				'telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'status' => $this->input->post('status')
			);

			if($this->its_m->tambahPelanggan($data)){
				redirect('/its/daftar_pelanggan');
			}

		}
	}

	public function editPelanggan(){
		if(isset($_REQUEST)){
			$data = array(
				'nama' => $this->input->post('nama'),
				'telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'status' => $this->input->post('status')
			);

			if($this->its_m->editPelanggan($data, $this->input->post('id_pelanggan'))){
				redirect('/its/daftar_pelanggan');
			}
		}
	}

	public function hapusPelanggan($id_pelanggan){
		if(!empty($id_pelanggan)){
			$this->its_m->hapusPelanggan($id_pelanggan);
		}
		redirect('/its/daftar_pelanggan');
	}


}
