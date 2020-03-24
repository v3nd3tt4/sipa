<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
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
        $data['title'] = 'Dokter';
        $data['script'] = 'dokter/script';
        $query = $this->db->get('tb_dokter');
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Dokter';
        $data['script'] = 'dokter/script';
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('dokter/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $nama_dokter = $this->input->post('nama_dokter', true);
        $keterangan = $this->input->post('keterangan', true);
        $simpan = $this->db->insert('tb_dokter', array('nama_dokter' => $nama_dokter, 'keterangan' => $keterangan));
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'dokter";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id_dokter){
        $hapus = $this->db->delete('tb_dokter', array('id_dokter' => $id_dokter));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'dokter";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id_dokter)
    {
        $query = $this->db->get_where('tb_dokter', array('id_dokter' => $id_dokter));
        $data['title'] = 'Edit Dokter';
        $data['script'] = 'dokter/script';
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('dokter/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        $id_dokter = $this->input->post('id_dokter', true);
        $nama_dokter = $this->input->post('nama_dokter', true);
        $keterangan = $this->input->post('keterangan', true);

        $simpan = $this->db->update('tb_dokter', array('nama_dokter' => $nama_dokter, 'keterangan' => $keterangan), array('id_dokter' => $id_dokter));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'dokter";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
