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
        $this->db->from('tb_resep');
        $this->db->join('tb_pasien', 'tb_pasien.id_pasien = tb_resep.id_pasien');
        $this->db->where(array('tb_resep.id_unit' => $this->session->userdata('unit')));
        $query = $this->db->get();
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

    public function store(){
        if(count($this->input->post('obat_order')) == 0){
            echo '<script>alert("silahkan pilih obat terlebih dahulu");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }
        $this->db->trans_begin();
        $data = array(
            'kode_resep' => $this->input->post('nama_resep', true),
            'id_unit' => $this->session->userdata('unit'),
            'id_dokter' => $this->input->post('id_dokter', true),
            'id_pasien' => $this->input->post('id_pasien', true),
            'nomor_rekam_medis' => $this->input->post('nomor_rekam_medis', true),
            'tanggal' => date('Y-m-d'),
            'status' => 'dibuat',
        );
        $this->db->insert('tb_resep', $data);
        $id_resep = $this->db->insert_id();
        $data2=array();
        for($i=0;$i<count($this->input->post('obat_order', true));$i++){
            $data2[] = array(
                'id_resep' => $id_resep,
                'id_obat' => $this->input->post('obat_order', true)[$i],
                'jumlah' => $this->input->post('obat_jumlah', true)[$i],
            );
            $get_satuan = $this->db->get_where('tb_stok', array('id_obat' => $this->input->post('obat_order', true)[$i]));
            $data3[] = array(
                'id_obat'		    => $this->input->post('obat_order', true)[$i],
                'tanggal_transaksi'	=> date('Y-m-d'),
                'nomor_faktur'		=> $this->input->post('nama_resep', true),
                'jumlah_unit'	    => $this->input->post('obat_jumlah', true)[$i],
                'id_satuan'	        => $get_satuan->row()->id_satuan,
                'status'            => 'penggunaan'

            );
        }
        $this->db->insert_batch('tb_resep_detail', $data2);
        $this->db->insert_batch('tb_stok', $data3);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }
        else
        {
            $this->db->trans_commit();
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'resep";</script>';
        }
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
        $this->load->view('resep/detail', $data);
    }
}