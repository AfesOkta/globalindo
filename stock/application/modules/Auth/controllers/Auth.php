<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author afes
 */
class Auth extends MY_Controller {
    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function index() {
        $data['assets'] = [
            'bootstrap_css' => base_url('assets/css/bootstrap.min.css'),
            'bootstrap_js' => base_url('assets/js/bootstrap.min.js'),
            'jquery' => base_url('assets/js/jquery-2.2.4.min.js'),
        ];
        $this->load->view('login', $data);
    }

    function checkLogin() {
        $email      = $this->input->post('email');        
        $password = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);                
        // query chek users
        $this->db->where('username',$email);
        //$this->db->where('password',  $hashPass);
        $users       = $this->db->get('pxuserlogin');
        if($users->num_rows()>0){
            $user = $users->row_array();
            if(password_verify($password,$user['password'])){
                // retrive user data to session
                $this->session->set_userdata($user);
                redirect('backend');
            }else{
                redirect('auth');
            }
        }else{            
            $this->session->set_flashdata('status_login','email atau password yang anda input salah');
            redirect('auth');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('welcome');
    }
}
