<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level', true) != 'Admin'){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index()
    {
        $data['title'] = 'Pasien';
        $data['script'] = 'pasien/script';
        $query = $this->db->get('tb_pasien');
        $data['row'] = $query;

        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pasien/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pasien';
        $data['script'] = 'pasien/script';
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pasien/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $config['upload_path']          = './gambar/pasien';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = date('YmdHis');
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			$foto =  $this->upload->data("file_name");
			$data_to_save = array(
                'nik' => $this->input->post('nik', true), 
                'nama' => $this->input->post('nama', true), 
                'jk' => $this->input->post('jk', true), 
                'tgl_lahir' => $this->input->post('tgl_lahir', true), 
                'agama' => $this->input->post('agama', true), 
                'rt' => $this->input->post('rt', true),
                'foto' => $foto,
                'rw' => $this->input->post('rw', true),
                'kelurahan' => $this->input->post('kelurahan', true),
                'alamat' => $this->input->post('alamat', true), 
                'jenis' => $this->input->post('jenis', true), 
            );
            $simpan = $this->db->insert('tb_pasien', $data_to_save);
            if($simpan){
                echo '<script>alert("Data Berhasil Disimpan");</script>';
                echo '<script>window.location.href = "'.base_url().'pasien";</script>';
            }else{
                echo '<script>alert("Data Gagal Disimpan");</script>';
                echo '<script>window.history.back();</script>';
            }
		}else{
			// echo $this->upload->display_errors();
			echo '<script>alert("terjadi kesalahan mengupload gambar");</script>';
			echo '<script>window.history.back();</script>';
		}
    }

    public function remove($id_pasien){
        $hapus = $this->db->delete('tb_pasien', array('id_pasien' => $id_pasien));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'pasien";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id_pasien)
    {
        $query = $this->db->get_where('tb_pasien', array('id_pasien' => $id_pasien));
        $data['title'] = 'Edit Pasien';
        $data['script'] = 'pasien/script';
        $data['row'] = $query;

        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pasien/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        if(!empty($_FILES['foto']['tmp_name'])){
			$config['upload_path']          = './gambar/pasien';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['file_name']            = date('YmdHis');
			$config['overwrite']			= true;
			$config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) {
				$foto =  $this->upload->data("file_name");
				$data_to_save = array(
                    'nik' => $this->input->post('nik', true), 
                    'nama' => $this->input->post('nama', true), 
                    'jk' => $this->input->post('jk', true), 
                    'tgl_lahir' => $this->input->post('tgl_lahir', true), 
                    'foto' => $foto,
                    'agama' => $this->input->post('agama', true), 
                    'rt' => $this->input->post('rt', true),
                    'rw' => $this->input->post('rw', true),
                    'kelurahan' => $this->input->post('kelurahan', true),
                    'alamat' => $this->input->post('alamat', true), 
                    'jenis' => $this->input->post('jenis', true), 
                );
                $simpan = $this->db->update('tb_pasien', $data_to_save, array('id_pasien'=> $this->input->post('id_pasien', true)));
                if($simpan){
                    echo '<script>alert("Data Berhasil Diupdate");</script>';
                    echo '<script>window.location.href = "'.base_url().'pasien";</script>';
                }else{
                    echo '<script>alert("Data Gagal Diupdate");</script>';
                    echo '<script>window.history.back();</script>';
                }
            }
		}else{
			$data_to_save = array(
                'nik' => $this->input->post('nik', true), 
                'nama' => $this->input->post('nama', true), 
                'jk' => $this->input->post('jk', true), 
                'tgl_lahir' => $this->input->post('tgl_lahir', true), 
                'agama' => $this->input->post('agama', true), 
                'rt' => $this->input->post('rt', true),
                'rw' => $this->input->post('rw', true),
                'kelurahan' => $this->input->post('kelurahan', true),
                'alamat' => $this->input->post('alamat', true), 
                'jenis' => $this->input->post('jenis', true), 
            );
            $simpan = $this->db->update('tb_pasien', $data_to_save, array('id_pasien'=> $this->input->post('id_pasien', true)));
            if($simpan){
                echo '<script>alert("Data Berhasil Diupdate");</script>';
                echo '<script>window.location.href = "'.base_url().'pasien";</script>';
            }else{
                echo '<script>alert("Data Gagal Diupdate");</script>';
                echo '<script>window.history.back();</script>';
            }
        }
    }
}
