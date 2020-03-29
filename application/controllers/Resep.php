<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level', true) != 'Operator'){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index()
    {
        $data['title'] = 'Resep';
        $data['script'] = 'resep/script';
        $query = $this->db->get('tb_resep');
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('resep/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah(){
        $data['title'] = 'Resep';
        $data['script'] = 'resep/script';
        $query = $this->db->get('tb_resep');
        $data['row'] = $query;

        $data['pasien'] = $this->db->get('tb_pasien');
        $data['dokter'] = $this->db->get('tb_dokter');

        $data['obat'] = $this->db->get('view_total_stok');

        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('resep/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }
}