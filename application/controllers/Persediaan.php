<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persediaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level', true) != 'Admin'){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index(){
        $data['title'] = 'Persediaan';
        $data['script'] = 'persediaan/script';

        $this->db->from('tb_obat');
        $query_obat = $this->db->get();
        $data['obat'] = $query_obat;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('persediaan/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function rekap($id_obat=''){
        
        $data['title'] = 'Persediaan';
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('persediaan/rekap', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function proses_rekap(){
        $tanggal_awal = $this->input->post('tanggal_awal', true);
        $tanggal_akhir = $this->input->post('tanggal_akhir', true);
        $this->db->from('tb_obat');
        $query_obat = $this->db->get();
        $data['obat'] = $query_obat;
        $data['title'] = 'Laporan per periode';
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('persediaan/cetak', $data);
    }

}