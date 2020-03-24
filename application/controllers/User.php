<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'User';
        $data['script'] = 'user/script';
        $this->db->from('tb_user');
        $this->db->join('tb_unit', 'tb_unit.id_unit=tb_user.unit');
        $query = $this->db->get();
        $data['row'] = $query;
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah User';
        $data['script'] = 'user/script';
        
        $query_unit = $this->db->get('tb_unit');
        $data['unit'] = $query_unit;
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('user/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $nama_user = $this->input->post('nama_user', true);
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $unit = $this->input->post('unit', true);
        $level = $this->input->post('level', true);
        $cek = $this->db->get_where('tb_user', array('username' => $username));
        if($cek->num_rows() != 0){
            echo '<script>alert("Username sudah ada yang menggunakan");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }
        $data_to_save = array(
            'nama_user' => $this->input->post('nama_user', true),
            'username'=> trim(strtolower($this->input->post('username', true))),
            'password' => trim(strtolower($this->input->post('password', true))),
            'unit' => $this->input->post('unit', true),
            'level' => $this->input->post('level', true),

        );
        $simpan = $this->db->insert('tb_user', $data_to_save);
        if($simpan){
            echo '<script>alert("Berhasil disimpan");</script>';
            echo '<script>window.location.href = "'.base_url().'user";</script>';
        }else{
            echo '<script>alert("Gagal disimpan");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function remove($id_user){
        $hapus = $this->db->delete('tb_user', array('id_user' => $id_user));
        if($hapus){
            echo '<script>alert("Berhasil dihapus");</script>';
            echo '<script>window.location.href = "'.base_url().'user";</script>';
        }else{
            echo '<script>alert("Gagal dihapus");</script>';
            echo '<script>window.history.back();</script>';
        }
    }

    public function edit($id_user)
    {
        $query = $this->db->get_where('tb_user', array('id_user' => $id_user));
        $data['title'] = 'Edit User';
        $data['script'] = 'user/script';
        $data['row'] = $query;

        $query_unit = $this->db->get('tb_unit');
        $data['unit'] = $query_unit;

        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function update(){
        $id_user = $this->input->post('id_user', true);
        

        $data_to_save = array(
            'nama_user' => $this->input->post('nama_user', true),
            'password' => trim(strtolower($this->input->post('password', true))),
            'unit' => $this->input->post('unit', true),
            'level' => $this->input->post('level', true),
        );

        $simpan = $this->db->update('tb_user', $data_to_save, array('id_user' => $id_user));
        if($simpan){
            echo '<script>alert("Berhasil diupdate");</script>';
            echo '<script>window.location.href = "'.base_url().'user";</script>';
        }else{
            echo '<script>alert("Gagal diupdate");</script>';
            echo '<script>window.history.back();</script>';
        }
    }
}
