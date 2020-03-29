<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
        $data['script'] = 'barang/script';

        $this->db->from('tb_barang');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan=tb_barang.id_satuan');
        $query_barang = $this->db->get();
        $data['barang'] = $query_barang;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah(){
        $data['title'] = 'Tambah Obat';
        $data['script'] = 'barang/script';

        $query_satuan = $this->db->get('tb_satuan');
        $data['satuan'] = $query_satuan;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('barang/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $sum_jumlah_beli = $this->input->post('jumlah_unit', true) * $this->input->post('harga_beli', true);
        $sum_jumlah_jual = $this->input->post('jumlah_unit', true) * $this->input->post('harga_jual', true);
        $data_to_save = array(
            'kode_barang'       => $this->input->post('kode_barang', true),
            'nama_barang'		=> $this->input->post('nama_barang', true),
            'tanggal'	        => $this->input->post('tanggal', true),
            'nomor_faktur'		=> $this->input->post('nomor_faktur', true),
            'jumlah_unit'	    => $this->input->post('jumlah_unit', true),
            'id_satuan'	        => $this->input->post('id_satuan', true),
            'harga_beli'	    => $this->input->post('harga_beli', true),
            'harga_jual'	    => $this->input->post('harga_jual', true),
            'sum_jumlah_beli'   => $sum_jumlah_beli,
            'sum_jumlah_jual'   => $sum_jumlah_jual,
        );
        $simpan = $this->db->insert('tb_barang', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'barang";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id_barang){
        $hapus = $this->db->delete('tb_barang', array('id_barang' => $id_barang));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'barang";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}