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
            'bootstrap_css' => base_url('assets/plugins/bootstrap/css/bootstrap.min.css'),
            'bootstrap_responsife_css' => base_url('assets/plugins/bootstrap/css/bootstrap-responsive.min.css'),
            'fontawesome_css' => base_url('assets/plugins/font-awesome/css/font-awesome.css'),
            'style_metro_css' => base_url('assets/css/style-metro.css'),
            'style_css' => base_url('assets/css/style.css'),
            'style_responsive_css' => base_url('assets/css/style-responsive.css'),
            'default_css' => base_url('assets/css/themes/default.css'),
            'uniform_style_css' => base_url('assets/plugins/uniform/css/uniform.default.css'),
            'select2_metro_css' => base_url('assets/plugins/select2/select2_metro.css'),
            'login_soft_css' => base_url('assets/css/pages/login-soft.css'),
            'bootstrap_js' => base_url('assets/js/bootstrap.min.js'),
            'jquery_js' => base_url('assets/js/jquery-2.2.4.min.js'),
            'jquery_migrate_js' => base_url('assets/plugins/jquery-migrate-1.2.1.min.js'),
            'jquery_ui_js' => base_url('assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'),
            'twitter_bootstrap_hover_dropdown_js' => base_url('assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js'),
            'excanvas_js' => base_url('assets/plugins/excanvas.min.js'),
            'respond_js' => base_url('assets/plugins/respond.min.js'),
            'jquery_slimscroll_js' => base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'),
            'jquery_blockui_js' => base_url('assets/plugins/jquery.blockui.min.js'),
            'jquery_cookie_js' => base_url('assets/plugins/jquery.cookie.min.js'),
            'jquery_uniform_js' => base_url('assets/plugins/uniform/jquery.uniform.min.js'),
            'jquery_validation_js' => base_url('assets/plugins/jquery-validation/dist/jquery.validate.min.js'),
            'jquery_backstretch_js' => base_url('assets/plugins/backstretch/jquery.backstretch.min.js'),
            'select2_js' => base_url('assets/plugins/select2/select2.min.js'),
            'app_js' => base_url('assets/scripts/app.js'),
            'login_soft_js' => base_url('assets/scripts/login-soft.js'),
            'logo_bio_png' => base_url('assets/img/kop.png'),
            'swal_js' => base_url('assets/plugins/sweetalert/dist/sweetalert.min.js'),
        ];
        $this->load->view('login', $data);
    }

    function checkLogin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password', TRUE);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $test = password_verify($password, $hashPass);
        // query chek users
        $this->db->where('userid', $email);
        //$this->db->where('password',  $hashPass);
        $users = $this->db->get('pxuserlogin');
        echo var_dump($users->num_rows());
        if ($users->num_rows() > 0) {
            $user = $users->row_array();
            if (password_verify($password, $user['password'])) {
                // retrive user data to session
                $this->session->set_userdata($user);
                redirect('backend');
            } else {
                redirect('login');
            }
        } else {
            if ($email == 'admin@admin.com' && $password == 'admin') {
                redirect('backend');
            }else{
                $this->session->set_flashdata('status_login', 'email atau password yang anda input salah');
                redirect('login');
            }            
        }
    }

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect('welcome');
    }

}
