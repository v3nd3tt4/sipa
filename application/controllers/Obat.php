<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level', true) != 'Admin'){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index(){
        $data['title'] = 'Obat';
        $data['script'] = 'obat/script';

        $this->db->from('tb_obat');
        $query_obat = $this->db->get();
        $data['obat'] = $query_obat;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('obat/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah(){
        $data['title'] = 'Tambah Obat';
        $data['script'] = 'obat/script';
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('obat/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $data_to_save = array(
            'kode_obat'     => trim($this->input->post('kode_obat', true)),
            'nama_obat'		=> $this->input->post('nama_obat', true),
            
        );
        $simpan = $this->db->insert('tb_obat', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'obat";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id_obat){
        $hapus = $this->db->delete('tb_obat', array('id_obat' => $id_obat));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'obat";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id_obat){
        $data['title'] = 'Edit Obat';
        $data['script'] = 'obat/script';

        $query = $this->db->get_where('tb_obat', array('id_obat' => $id_obat));
        $data['obat'] = $query;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('obat/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        $data_to_save = array(
            'kode_obat'     => trim($this->input->post('kode_obat', true)),
            'nama_obat'		=> $this->input->post('nama_obat', true),
            
        );
        $simpan = $this->db->update('tb_obat', $data_to_save, array('id_obat' => $this->input->post('id_obat', true)));
        if($simpan){
            echo '<script>alert("Berhasil diedit");</script>';
            echo '<script>window.location.href = "'.base_url().'obat";</script>';
        }else{
            echo '<script>alert("Gagal diedit");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}