<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level', true) != 'Kasir'){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $data['script'] = 'laporan/script';
        $this->db->from('tb_resep');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_resep.id_pasien');
        $query = $this->db->get();
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function hari(){
        $tanggal_bayar = $this->input->post('tanggal', true);
        $id_kasir = $this->session->userdata('id_user');
        $query = "SELECT * FROM tb_resep join tb_resep_detail on tb_resep_detail.id_resep = tb_resep.id_resep 
        join tb_pasien on tb_pasien.id_pasien = tb_resep.id_pasien
        join tb_obat on tb_obat.id_obat = tb_resep_detail.id_obat
        where id_kasir = '$id_kasir' and tanggal_bayar = '$tanggal_bayar'";
        $exe = $this->db->query($query);
        $data['data_laporan'] = $exe;
        $data['title'] = 'Laporan per hari';
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('laporan/perhari', $data);
    }

    public function periode(){
        $tanggal_awal = $this->input->post('tanggal_awal', true);
        $tanggal_akhir = $this->input->post('tanggal_akhir', true);
        $id_kasir = $this->session->userdata('id_user');
        $query = "SELECT * FROM tb_resep join tb_resep_detail on tb_resep_detail.id_resep = tb_resep.id_resep 
        join tb_pasien on tb_pasien.id_pasien = tb_resep.id_pasien
        join tb_obat on tb_obat.id_obat = tb_resep_detail.id_obat
        where id_kasir = '$id_kasir' and tanggal_bayar between '$tanggal_awal' and '$tanggal_akhir' ";
        $exe = $this->db->query($query);
        $data['data_laporan'] = $exe;
        $data['title'] = 'Laporan per periode';
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('laporan/perperiode', $data);
    }
}