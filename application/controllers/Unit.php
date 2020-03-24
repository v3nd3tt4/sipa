<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
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
        $data['title'] = 'Unit';
        $data['script'] = 'unit/script';
        $query = $this->db->get('tb_unit');
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('unit/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Unit';
        $data['script'] = 'unit/script';
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('unit/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $nama_unit = $this->input->post('nama_unit', true);
        $simpan = $this->db->insert('tb_unit', array('nama_unit' => $nama_unit));
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'unit";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id_unit){
        $hapus = $this->db->delete('tb_unit', array('id_unit' => $id_unit));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'unit";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id_unit)
    {
        $query = $this->db->get_where('tb_unit', array('id_unit' => $id_unit));
        $data['title'] = 'Edit Unit';
        $data['script'] = 'unit/script';
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('unit/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        $id_unit = $this->input->post('id_unit', true);
        $nama_unit = $this->input->post('nama_unit', true);
        $simpan = $this->db->update('tb_unit', array('nama_unit' => $nama_unit), array('id_unit' => $id_unit));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'unit";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
