<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
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
        $data['title'] = 'Satuan';
        $data['script'] = 'Satuan/script';
        $query = $this->db->get('tb_satuan');
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('satuan/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Satuan';
        $data['script'] = 'satuan/script';
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('satuan/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $nama_satuan = $this->input->post('nama_satuan', true);
        $simpan = $this->db->insert('tb_satuan', array('nama_satuan' => $nama_satuan));
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'satuan";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id_satuan){
        $hapus = $this->db->delete('tb_satuan', array('id_satuan' => $id_satuan));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'satuan";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id_satuan)
    {
        $query = $this->db->get_where('tb_satuan', array('id_satuan' => $id_satuan));
        $data['title'] = 'Edit Satuan';
        $data['script'] = 'satuan/script';
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('satuan/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        $id_satuan = $this->input->post('id_satuan', true);
        $nama_satuan = $this->input->post('nama_satuan', true);
        $simpan = $this->db->update('tb_satuan', array('nama_satuan' => $nama_satuan), array('id_satuan' => $id_satuan));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'satuan";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
