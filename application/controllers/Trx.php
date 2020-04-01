<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trx extends CI_Controller
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
        $data['title'] = 'Transaksi';
        $data['script'] = 'trx/script';
        $this->db->from('tb_resep');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_resep.id_pasien');
        $query = $this->db->get();
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('trx/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function cek($id_resep){
        $data['title'] = 'DetailResep';

        $this->db->from('tb_resep');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien=tb_resep.id_pasien');
        $this->db->join('tb_dokter', 'tb_dokter.id_dokter=tb_resep.id_dokter');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_resep.id_unit');
        $this->db->where(array('id_resep' => $id_resep));
        $data['row_resep']=$this->db->get();

        $this->db->from('tb_resep_detail');
        $this->db->join('tb_obat', 'tb_obat.id_obat=tb_resep_detail.id_obat');
        $this->db->where(array('id_resep' => $id_resep));
        $data['row_resep_detail']=$this->db->get();

        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('trx/cek', $data);
    }

    public function selesai($id_resep){
        $simpan = $this->db->update('tb_resep', array('status' => 'selesai', 'tanggal_diberikan' => date('Y-m-d')), array('id_resep' => $id_resep));
        if($simpan){
            echo '<script>alert("Berhasil diproses");</script>';
            echo '<script>window.location.href = "'.base_url().'trx";</script>';
        }else{
            echo '<script>alert("Gagal diproses");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}