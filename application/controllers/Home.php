<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('login', true))){
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function index()
    {
        //get kadaluarsa 
        $data['data_kadaluarsa'] = $this->db->query("
            select
            * 
            from 
            tb_stok
            left join tb_obat on tb_obat.id_obat = tb_stok.id_obat
            where
            tanggal_kadaluarsa 
            between curdate() and 
            DATE_add(curdate(), INTERVAL 6 MONTH)
        ");

        //get Jatuh Tempo 
        $data['data_jatuh_tempo'] = $this->db->query("
            select
            * 
            from 
            tb_stok
            left join tb_obat on tb_obat.id_obat = tb_stok.id_obat
            where
            tanggal_jatuh_tempo 
            between curdate() and 
            DATE_add(curdate(), INTERVAL 1 MONTH)
        ");

        $data['title'] = 'Dashboard';
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('sifa/index', $data);
        $this->load->view('_layout_sifa/footer');
    }
}
