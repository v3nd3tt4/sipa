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

    public function kartu_stok($id_obat){
        $obat = $this->db->get_where('tb_obat', array('id_obat' => $id_obat));
        $data['obat'] = $obat;
        $data['title'] = 'Persediaan';
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('persediaan/kartu_stok', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }
    
    public function proses_kartu_stok(){
        $tanggal_awal = $this->input->post('tanggal_awal', true);
        $tanggal_akhir = $this->input->post('tanggal_akhir', true);
        $id_obat = $this->input->post('id_obat', true);
        $obat = $this->db->get_where('tb_obat', array('id_obat' => $id_obat));
        $data['obat'] = $obat;

        $stok = $this->db->get_where('tb_stok', array('id_obat' => $id_obat));
        $stok = $this->db->query("SELECT * from tb_stok where id_obat = '".$id_obat."' and tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir'");

        $data['stok'] = $stok;
        $data['title'] = 'Kartu Stok';
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('persediaan/cetak_kartu_stok', $data);
    }
}