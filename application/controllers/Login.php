<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function index(){
        if(!empty($this->session->userdata('login', true))){
            echo '<script>window.location.href = "'.base_url().'home";</script>';
        }
        $data['title'] = 'Login';
        $this->load->view('_layout_sifa/auth-header', $data);
        $this->load->view('login', $data);
        $this->load->view('_layout_sifa/auth-footers', $data);
    }

    public function proses_login(){
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $cek = $this->db->get_where('tb_user', array('username' => $username, 'password' => $password));
        if($cek->num_rows() != 0){
            $sess = array(
                'id_user' => $cek->row()->id_user,
                'username' => $cek->row()->username,
                'nama_user' => $cek->row()->nama_user,
                'unit' => $cek->row()->unit,
                'level' => $cek->row()->level,
                'login' => true
            );
            $this->session->set_userdata($sess);
            echo '<script>alert("Berhasil Login");</script>';
            echo '<script>window.location.href = "'.base_url().'home";</script>';
        }else{
            echo '<script>alert("User tidak ditemukan");</script>';
            echo '<script>window.location.href = "'.base_url().'";</script>';
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        echo '<script>alert("Berhasil Keluar");</script>';
        echo '<script>window.location.href = "'.base_url().'";</script>';
    }
}
    