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
        $id_pemesanan = $this->get('id_pemesanan');
        $id_komplain_nonmarket = $this->get('id_komplain_nonmarket');
        $id_komplain = $this->get('id_komplain');
        $id_sp = $this->get('id_sp');
        $id_pelanggan = $this->get('id_pelanggan');
        $id_pemasukan = $this->get('id_pemasukan');
        $id_SKP = $this->get('id_SKP');
        $idTagihan = $this->get('idTagihan');
        $idKategori = $this->get('idKategori');
        $idSupplier = $this->get('idSupplier');
        $idBarang = $this->get('idBarang');
        $id_about = $this->get('id_about');
        $id_article = $this->get('id_article');
        $id_banner = $this->get('id_banner');
        $id_pegawai = $this->get('idpegawai');
        $id_absen = $this->get('id_absen');
        $id_status = $this->get('id_status');
        $id_karyawan = $this->get('id_karyawan');
        $id_sdm = $this->get('id_sdm');

        //add all function
        if ($id != '') {
            if ($id == 'all') {
              $telkomdb = $this->db->get('login')->result();
            } else {
              $this->db->where('id', $id);
              $telkomdb = $this->db->get('login')->result();
            }
        } elseif ($id_pemesanan != '') {
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
        } elseif ($id_komplain != '') {
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
        } elseif ($id_pemasukan != '') {
            if ($id_pemasukan == 'all') {
              $telkomdb = $this->db->get('finance')->result();
            } else {
              $this->db->where('id_pemasukan', $id_pemasukan);
              $telkomdb = $this->db->get('finance')->result();
            }
        } elseif ($id_SKP  != '') {
            if ($id_SKP == 'all') {
              $telkomdb = $this->db->get('skp')->result();
            } else {
              $this->db->where('id_SKP', $id_SKP);
              $telkomdb = $this->db->get('skp')->result();
            }
        } elseif ($idTagihan != '') {
            if ($idTagihan == 'all') {
              $telkomdb = $this->db->get('tagihan')->result();
            } else {
              $this->db->where('idTagihan', $idTagihan);
              $telkomdb = $this->db->get('tagihan')->result();
            }
        } elseif ($idKategori != '') {
            if ($idKategori == 'all') {
              $telkomdb = $this->db->get('kategori')->result();
            } else {
              $this->db->where('idKategori', $id_Kategori);
              $telkomdb = $this->db->get('kategori')->result();
            }
        } elseif ($idSupplier != '') {
            if ($idSupplier == 'all') {
              $telkomdb = $this->db->get('supplier')->result();
            } else {
              $this->db->where('idSupplier', $idSupplier);
              $telkomdb = $this->db->get('supplier')->result();
            }
        } elseif ($idBarang != '') {
            if ($idBarang == 'all') {
              $telkomdb = $this->db->get('inventory')->result();
            } else {
              $this->db->where('idBarang', $idBarang);
              $telkomdb = $this->db->get('inventory')->result();
            }
        } elseif ($id_about != '') {
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
        } elseif ($id_pegawai != '') {
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
      $dataLogin = array(
                  'id'           => $this->put('id'),
                  'first_name'   => $this->put('first_name'),
                  'last_name'    => $this->put('last_name'),
                  'username'    => $this->put('username'),
                  'password'    => $this->put('password'),
                  'email'    => $this->put('email'),
                  'staff_id'    => $this->put('staff_id'),
                  'profile_pic'    => $this->put('profile_pic')
      );
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
      $dataFinance = array(
                  'id_pemasukan'           => $this->put('id_pemasukan'),
                  'blanko'   => $this->put('blanko'),
                  'tipe'    => $this->put('tipe'),
                  'keperluan'    => $this->put('keperluan'),
                  'tanggal'    => $this->put('tanggal'),
                  'debit'    => $this->put('debit'),
                  'kredit'    => $this->put('kredit')
      );
      $dataSkp = array(
                  'idSkp'           => $this->put('idSkp'),
                  'NamaKaryawan'   => $this->put('NamaKaryawan'),
                  'NIP'    => $this->put('NIP'),
                  'Jabatan'    => $this->put('email')
      );
      $dataTagihan = array(
                  'idTagihan'           => $this->put('idTagihan'),
                  'Nama'   => $this->put('Nama'),
                  'Tagihan'    => $this->put('no_identitas')
      );
      $dataKategori = array(
                  'idKategori'           => $this->put('idKategori'),
                  'namaKategori'   => $this->put('namaKategori'),
                  'keterangan'    => $this->put('keterangan')
      );
      $dataSupplier = array(
                  'idSupplier'           => $this->put('idSupplier'),
                  'namaSupplier'   => $this->put('namaSupplier'),
                  'deskripsi'    => $this->put('deskripsi'),
                  'idKategori'    => $this->put('idKategori')
      );
      $dataBarang = array(
                  'idBarang'           => $this->put('idBarang'),
                  'namabarang'   => $this->put('namaBarang'),
                  'stockBarang'    => $this->put('stockBarang'),
                  'idSupplier'    => $this->put('idSupplier'),
                  'keterangan'    => $this->put('keterangan'),
                  'komplain'    => $this->put('komplain')
      );
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

      if ($dataLogin != '') {
          $insert = $this->db->insert('login', $dataLogin);
      } elseif ($dataPemesanan != '') {
          $insert = $this->db->insert('pemesanan', $dataPemesanan);
      } elseif ($dataNonKomplain != '') {
          $insert = $this->db->insert('komplain_nonmarket', $dataNonKomplain);
      } elseif ($dataKomplain != '') {
          $insert = $this->db->insert('komplain', $dataKomplain);
      } elseif ($dataSp != '') {
          $insert = $this->db->insert('status_pemasangan', $dataSp);
      } elseif ($dataPelanggan != '') {
          $insert = $this->db->insert('pelanggan', $dataPelanggan);
      } elseif ($dataFinance != '') {
          $insert = $this->db->insert('finance', $dataFinance);
      } elseif ($dataSkp  != '') {
          $insert = $this->db->insert('skp', $dataSkp);
      } elseif ($dataTagihan != '') {
          $insert = $this->db->insert('tagihan', $dataTagihan);
      } elseif ($dataKategori != '') {
          $insert = $this->db->insert('kategori', $dataKategori);
      } elseif ($dataSupplier != '') {
          $insert = $this->db->insert('supplier', $dataSupplier);
      } elseif ($dataBarang != '') {
          $insert = $this->db->insert('inventory', $dataBarang);
      } elseif ($dataAbout != '') {
          $insert = $this->db->insert('about', $dataAbout);
      } elseif ($dataArticle != '') {
          $insert = $this->db->insert('article', $dataArticle);
      } elseif ($dataBanner != '') {
          $insert = $this->db->insert('banner', $dataBanner);
      } elseif ($dataPegawai != '') {
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
        $id = $this->put('id');
        $id_pemesanan = $this->put('id_pemesanan');
        $id_komplain_nonmarket = $this->put('id_komplain_nonmarket');
        $id_komplain = $this->put('id_komplain');
        $id_sp = $this->put('id_sp');
        $id_pelanggan = $this->put('id_pelanggan');
        $id_pemasukan = $this->put('id_pemasukan');
        $id_SKP = $this->put('id_SKP');
        $idTagihan = $this->put('idTagihan');
        $idKategori = $this->put('idKategori');
        $idSupplier = $this->put('idSupplier');
        $idBarang = $this->put('idBarang');
        $id_about = $this->put('id_about');
        $id_article = $this->put('id_article');
        $id_banner = $this->put('id_banner');
        $id_pegawai = $this->put('idpegawai');
        $id_absen = $this->put('id_absen');
        $id_status = $this->put('id_status');
        $id_karyawan = $this->put('id_karyawan');
        $id_sdm = $this->put('id_sdm');

        $dataLogin = array(
                    'id'           => $this->put('id'),
                    'first_name'   => $this->put('first_name'),
                    'last_name'    => $this->put('last_name'),
                    'username'    => $this->put('username'),
                    'password'    => $this->put('password'),
                    'email'    => $this->put('email'),
                    'staff_id'    => $this->put('staff_id'),
                    'profile_pic'    => $this->put('profile_pic')
        );
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
        $dataFinance = array(
                    'id_pemasukan'           => $this->put('id_pemasukan'),
                    'blanko'   => $this->put('blanko'),
                    'tipe'    => $this->put('tipe'),
                    'keperluan'    => $this->put('keperluan'),
                    'tanggal'    => $this->put('tanggal'),
                    'debit'    => $this->put('debit'),
                    'kredit'    => $this->put('kredit')
        );
        $dataSkp = array(
                    'idSkp'           => $this->put('idSkp'),
                    'NamaKaryawan'   => $this->put('NamaKaryawan'),
                    'NIP'    => $this->put('NIP'),
                    'Jabatan'    => $this->put('email')
        );
        $dataTagihan = array(
                    'idTagihan'           => $this->put('idTagihan'),
                    'Nama'   => $this->put('Nama'),
                    'Tagihan'    => $this->put('no_identitas')
        );
        $dataKategori = array(
                    'idKategori'           => $this->put('idKategori'),
                    'namaKategori'   => $this->put('namaKategori'),
                    'keterangan'    => $this->put('keterangan')
        );
        $dataSupplier = array(
                    'idSupplier'           => $this->put('idSupplier'),
                    'namaSupplier'   => $this->put('namaSupplier'),
                    'deskripsi'    => $this->put('deskripsi'),
                    'idKategori'    => $this->put('idKategori')
        );
        $dataBarang = array(
                    'idBarang'           => $this->put('idBarang'),
                    'namabarang'   => $this->put('namaBarang'),
                    'stockBarang'    => $this->put('stockBarang'),
                    'idSupplier'    => $this->put('idSupplier'),
                    'keterangan'    => $this->put('keterangan'),
                    'komplain'    => $this->put('komplain')
        );
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
                  if ($dataLogin != '') {
                      $this->db->where('id', $id);
                      $update = $this->db->update('login', $dataLogin);
                  } elseif ($dataPemesanan != '') {
                      $this->db->where('id_pemesanan', $id_pemesanan);
                      $update = $this->db->update('pemesanan', $dataPemesanan);
                  } elseif ($dataNonKomplain != '') {
                      $this->db->where('id_komplain_nonmarket', $id_komplain_nonmarket);
                      $update = $this->db->update('komplain_nonmarket', $dataNonKomplain);
                  } elseif ($dataKomplain != '') {
                      $this->db->where('id_komplain', $id_komplain);
                      $update = $this->db->update('komplain', $dataKomplain);
                  } elseif ($dataSp != '') {
                      $this->db->where('id_sp', $id_sp);
                      $update = $this->db->update('status_pemasangan', $dataSp);
                  } elseif ($dataPelanggan != '') {
                      $this->db->where('id_pelanggan', $id_pelanggan);
                      $update = $this->db->update('pelanggan', $dataPelanggan);
                  } elseif ($dataFinance != '') {
                      $this->db->where('id_pemasukan', $id_pemasukan);
                      $update = $this->db->update('finance', $dataFinance);
                  } elseif ($dataSkp  != '') {
                      $this->db->where('idSKP', $id_SKP);
                      $update = $this->db->update('skp', $dataSkp);
                  } elseif ($dataTagihan != '') {
                      $this->db->where('idTagihan', $idTagihan);
                      $update = $this->db->update('tagihan', $dataTagihan);
                  } elseif ($dataKategori != '') {
                      $this->db->where('idKategori', $idKategori);
                      $update = $this->db->update('kategori', $dataKategori);
                  } elseif ($dataSupplier != '') {
                      $this->db->where('idSupplier', $idSupplier);
                      $update = $this->db->update('supplier', $dataSupplier);
                  } elseif ($dataBarang != '') {
                      $this->db->where('idBarang', $idBarang);
                      $update = $this->db->update('inventory', $dataBarang);
                  } elseif ($dataAbout != '') {
                      $this->db->where('id_about', $id_about);
                      $update = $this->db->update('about', $dataAbout);
                  } elseif ($dataArticle != '') {
                      $this->db->where('id_article', $id_article);
                      $update = $this->db->update('article', $dataArticle);
                  } elseif ($dataBanner != '') {
                      $this->db->where('id_banner', $id_banner);
                      $update = $this->db->update('banner', $dataBanner);
                  } elseif ($dataPegawai != '') {
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
        $id = $this->delete('id');
        $id_pemesanan = $this->delete('id_pemesanan');
        $id_komplain_nonmarket = $this->delete('id_komplain_nonmarket');
        $id_komplain = $this->delete('id_komplain');
        $id_sp = $this->delete('id_sp');
        $id_pelanggan = $this->delete('id_pelanggan');
        $id_pemasukan = $this->delete('id_pemasukan');
        $id_SKP = $this->delete('id_SKP');
        $idTagihan = $this->delete('idTagihan');
        $idKategori = $this->delete('idKategori');
        $idSupplier = $this->delete('idSupplier');
        $idBarang = $this->delete('idBarang');
        $id_about = $this->delete('id_about');
        $id_article = $this->delete('id_article');
        $id_banner = $this->delete('id_banner');
        $id_pegawai = $this->delete('idpegawai');
        $id_absen = $this->delete('id_absen');
        $id_status = $this->delete('id_status');
        $id_karyawan = $this->delete('id_karyawan');
        $id_sdm = $this->delete('id_sdm');

        if ($id != '') {
            $this->db->where('id', $id);
            $delete = $this->db->delete('login');
        } elseif ($id_pemesanan != '') {
            $this->db->where('id_pemesanan', $id_pemesanan);
            $delete = $this->db->delete('pemesanan');
        } elseif ($id_komplain_nonmarket != '') {
            $this->db->where('id_komplain_nonmarket', $id_komplain_nonmarket);
            $delete = $this->db->delete('komplain_nonmarket');
        } elseif ($id_komplain != '') {
            $this->db->where('id_komplain', $id_komplain);
            $delete = $this->db->delete('komplain');
        } elseif ($id_sp != '') {
            $this->db->where('id_sp', $id_sp);
            $delete = $this->db->delete('status_pemasangan');
        } elseif ($id_pelanggan != '') {
            $this->db->where('id_pelanggan', $id_pelanggan);
            $delete = $this->db->delete('pelanggan');
        } elseif ($id_pemasukan != '') {
            $this->db->where('id_pemasukan', $id_pemasukan);
            $delete = $this->db->delete('finance');
        } elseif ($id_SKP  != '') {
            $this->db->where('id_SKP', $id_SKP);
            $delete = $this->db->delete('skp');
        } elseif ($idTagihan != '') {
            $this->db->where('idTagihan', $idTagihan);
            $delete = $this->db->delete('tagihan');
        } elseif ($idKategori != '') {
            $this->db->where('idKategori', $idKategori);
            $delete = $this->db->delete('kategori');
        } elseif ($idSupplier != '') {
            $this->db->where('idSupplier', $idSupplier);
            $delete = $this->db->delete('supplier');
        } elseif ($idBarang != '') {
            $this->db->where('idBarang', $idBarang);
            $delete = $this->db->delete('inventory');
        } elseif ($id_about != '') {
            $this->db->where('id_about', $id_about);
            $delete = $this->db->delete('about');
        } elseif ($id_article != '') {
            $this->db->where('id_article', $id_article);
            $delete = $this->db->delete('article');
        } elseif ($id_banner != '') {
            $this->db->where('id_banner', $id_banner);
            $delete = $this->db->delete('banner');
        } elseif ($id_pegawai != '') {
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
