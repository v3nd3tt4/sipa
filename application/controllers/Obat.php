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

    public function tambah_stok($id_obat){
        $data['title'] = 'Tambah Stok';
        $data['script'] = 'obat/script';


        $query = $this->db->get_where('tb_obat', array('id_obat' => $id_obat));
        $data['obat'] = $query;

        $query_satuan = $this->db->get('tb_satuan');
        $data['satuan'] = $query_satuan;

        $query_pbf = $this->db->get('tb_pbf');
        $data['pbf'] = $query_pbf;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('obat/tambah_stok', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store_stok(){
        $sum_jumlah_beli = $this->input->post('jumlah_unit', true) * $this->input->post('harga_beli', true);
        $sum_jumlah_jual = $this->input->post('jumlah_unit', true) * $this->input->post('harga_jual', true);
        $cek = $this->db->get_where('tb_stok', array('id_obat' => $this->input->post('id_obat', true)));
        if($cek->num_rows() == 0){
            $status = 'stok awal';
        }else{
            $status = 'pembelian';
        }
        $data_to_save = array(
            'id_obat'		    => $this->input->post('id_obat', true),
            'tanggal_transaksi'	=> $this->input->post('tanggal', true),
            'tanggal_kadaluarsa'	=> $this->input->post('tanggal_kadaluarsa', true),
            'tanggal_jatuh_tempo'	=> $this->input->post('tanggal_jatuh_tempo', true),
            'id_pbf'	        => $this->input->post('id_pbf', true),
            'nomor_faktur'		=> $this->input->post('nomor_faktur', true),
            'jumlah_unit'	    => $this->input->post('jumlah_unit', true),
            'id_satuan'	        => $this->input->post('id_satuan', true),
            'harga_beli'	    => $this->input->post('harga_beli', true),
            'harga_jual'	    => $this->input->post('harga_jual', true),
            'no_batch'	    => $this->input->post('no_batch', true),
            'sum_harga_beli'    => $sum_jumlah_beli,
            'sum_harga_jual'    => $sum_jumlah_jual,
            'status'            => $status
        );
        $simpan = $this->db->insert('tb_stok', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'obat/riwayat_stok/'.$this->input->post('id_obat', true).'";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function riwayat_stok($id_obat){
        $data['title'] = 'Riwayat Stok';
        $data['script'] = 'obat/script';

        $this->db->from('tb_stok');
        $this->db->join('tb_obat', 'tb_obat.id_obat = tb_stok.id_obat');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_stok.id_satuan');
        $this->db->join('tb_pbf', 'tb_pbf.id_pbf = tb_stok.id_pbf', 'left');
        $this->db->where(array('tb_stok.id_obat' => $id_obat));
        $query = $this->db->get();
        $data['riwayat'] = $query;

        $query1 = $this->db->get_where('tb_obat', array('id_obat' => $id_obat));
        $data['obat'] = $query1;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('stok/riwayat', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

}