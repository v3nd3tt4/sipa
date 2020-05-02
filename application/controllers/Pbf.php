<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pbf extends CI_Controller
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
        $data['title'] = 'Pbf';
        $data['script'] = 'pbf/script';
        $query = $this->db->get('tb_pbf');
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pbf/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pbf';
        $data['script'] = 'pbf/script';
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pbf/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $nama_pbf = $this->input->post('nama_pbf', true);
        $simpan = $this->db->insert('tb_pbf', array('nama_pbf' => $nama_pbf));
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'pbf";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id_pbf){
        $hapus = $this->db->delete('tb_pbf', array('id_pbf' => $id_pbf));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'pbf";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id_pbf)
    {
        $query = $this->db->get_where('tb_pbf', array('id_pbf' => $id_pbf));
        $data['title'] = 'Edit pbf';
        $data['script'] = 'pbf/script';
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pbf/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        $id_pbf = $this->input->post('id_pbf', true);
        $nama_pbf = $this->input->post('nama_pbf', true);
        $simpan = $this->db->update('tb_pbf', array('nama_pbf' => $nama_pbf), array('id_pbf' => $id_pbf));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'pbf";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
