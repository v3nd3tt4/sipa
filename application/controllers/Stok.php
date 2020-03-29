<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level', true) != 'Admin'){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index(){
        $data['title'] = 'Stok';
        $data['script'] = 'stok/script';

        $this->db->from('tb_stok');
        $query_stok = $this->db->get();
        $data['stok'] = $query_stok;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('stok/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah(){
        $data['title'] = 'Tambah Stok';
        $data['script'] = 'stok/script';
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('stok/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $data_to_save = array(
            'kode_stok'     => trim($this->input->post('kode_stok', true)),
            'nama_stok'		=> $this->input->post('nama_stok', true),
            
        );
        $simpan = $this->db->insert('tb_stok', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'stok";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id_stok){
        $hapus = $this->db->delete('tb_stok', array('id_stok' => $id_stok));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'stok";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id_stok){
        $data['title'] = 'Edit Stok';
        $data['script'] = 'stok/script';

        $query = $this->db->get_where('tb_stok', array('id_stok' => $id_stok));
        $data['stok'] = $query;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('stok/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        $data_to_save = array(
            'kode_stok'     => trim($this->input->post('kode_stok', true)),
            'nama_stok'		=> $this->input->post('nama_stok', true),
            
        );
        $simpan = $this->db->update('tb_stok', $data_to_save, array('id_stok' => $this->input->post('id_stok', true)));
        if($simpan){
            echo '<script>alert("Berhasil diedit");</script>';
            echo '<script>window.location.href = "'.base_url().'stok";</script>';
        }else{
            echo '<script>alert("Gagal diedit");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    
}