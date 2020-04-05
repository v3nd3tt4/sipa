<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
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
        $data['title'] = 'Kasir';
        $data['script'] = 'kasir/script';
        $this->db->from('tb_resep');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_resep.id_pasien');
        $query = $this->db->get();
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('kasir/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function detail($id_resep){
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
        $this->load->view('kasir/detail', $data);
    }

    public function prev_trx(){
        // print_r($_POST);
        $data['title'] = 'DetailResep';
        $id_resep = $this->input->post('id_resep_bayar', true);

        $data_from_post = array();
        for($i=0;$i<count($this->input->post('id_resep_detail_bayar', true));$i++){
            $data_from_post[] = array(
                'id_resep_detail' => $this->input->post('id_resep_detail_bayar', true)[$i],
                'harga_beli' => $this->input->post('harga_beli_bayar', true)[$i],
                'harga_jual' => $this->input->post('harga_jual_bayar', true)[$i],

            );
        }

        // print_r($data_from_post);exit();

        $this->db->from('tb_resep');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien=tb_resep.id_pasien');
        $this->db->join('tb_dokter', 'tb_dokter.id_dokter=tb_resep.id_dokter');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_resep.id_unit');
        $this->db->where(array('id_resep' => $id_resep));
        $data['row_resep']=$this->db->get();

        // $this->db->from('tb_resep_detail');
        // $this->db->join('tb_obat', 'tb_obat.id_obat=tb_resep_detail.id_obat');
        // $this->db->where(array('id_resep' => $id_resep));
        // $data['row_resep_detail']=$this->db->get();
        $data['data_from_post'] = $data_from_post;
        

        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('kasir/prev_trx', $data);
    }

    public function proses_bayar(){
        $this->db->trans_begin();

        $id_resep = $this->input->post('id_resep_bayar', true);
        $update_resep = $this->db->update('tb_resep', array('status' => 'dibayar', 'id_kasir' => $this->session->userdata('id_user'), 'tanggal_bayar' => date('Y-m-d')), array('id_resep' => $id_resep));

        $get_kode_resep = $this->db->get_where('tb_resep', array('id_resep' => $id_resep));
        $kode_resep = $get_kode_resep->row()->kode_resep;

        $data_resep_detail = array();
        $data_stok = array();
        for($i=0;$i<count($this->input->post('id_resep_detail_bayar', true));$i++){
            $jumlah = $this->input->post('jumlah_bayar', true)[$i];
            $sum_harga_beli = $jumlah*$this->input->post('harga_beli_bayar', true)[$i];
            $sum_harga_jual = $jumlah*$this->input->post('harga_jual_bayar', true)[$i];

            $data_resep_detail = array(
                'harga_beli' => $this->input->post('harga_beli_bayar', true)[$i],
                'harga_jual' => $this->input->post('harga_jual_bayar', true)[$i],
                'sum_harga_beli' => $sum_harga_beli,
                'sum_harga_jual' => $sum_harga_jual,
            );
            //update resep detail
            $this->db->update('tb_resep_detail', $data_resep_detail, array('id_resep_detail' => $this->input->post('id_resep_detail_bayar', true)[$i]));

            $get_resep_detail = $this->db->get_where('tb_resep_detail', array('id_resep_detail' => $this->input->post('id_resep_detail_bayar', true)[$i]));
            $id_obat = $get_resep_detail->row()->id_obat;

            //update stok 
            $this->db->update('tb_stok', $data_resep_detail, array('nomor_faktur' => $kode_resep, 'id_obat' => $id_obat));
        }
        // print_r($data_resep_detail);exit();
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            echo '<script>alert("Pembayaran gagal diproses");</script>';
            echo '<script>window.history.back();</script>';
        }
        else{
            $this->db->trans_commit();
            echo '<script>alert("Pembayaran berhasil diproses");</script>';
            echo '<script>window.location.href = "'.base_url().'kasir";</script>';
        }
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
        $this->load->view('kasir/cek', $data);
    }
}