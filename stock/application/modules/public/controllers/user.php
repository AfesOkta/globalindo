<?php
class User extends Authenticated_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $this->data['useDatatables'] = TRUE;
        $this->data['subview'] = 'admin/user/list';
        $this->data['sAjaxSource'] = 'admin/user/datatable';
        $this->load->view('common/_layouts/main', $this->data);
    }

    public function login() {
       
        $this->data['assets'] = [
            'bootstrap_css' => assets_url('plugins/bootstrap/css/bootstrap.min.css'),
            'bootstrap_responsife_css' => assets_url('plugins/bootstrap/css/bootstrap-responsive.min.css'),
            'fontawesome_css' => assets_url('plugins/font-awesome/css/font-awesome.css'),
            'style_metro_css' => assets_url('css/style-metro.css'),
            'style_css' => assets_url('css/style.css'),
            'style_responsive_css' => assets_url('css/style-responsive.css'),
            'default_css' => assets_url('css/themes/default.css'),
            'uniform_style_css' => assets_url('plugins/uniform/css/uniform.default.css'),
            'select2_metro_css' => assets_url('plugins/select2/select2_metro.css'),
            'login_soft_css' => assets_url('css/pages/login.css'),
            'bootstrap_js' => assets_url('js/bootstrap.min.js'),
            'jquery_js' => assets_url('js/jquery-2.2.4.min.js'),
            'jquery_migrate_js' => assets_url('plugins/jquery-migrate-1.2.1.min.js'),
            'jquery_ui_js' => assets_url('plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'),
            'twitter_bootstrap_hover_dropdown_js' => assets_url('plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js'),
            'excanvas_js' => assets_url('plugins/excanvas.min.js'),
            'respond_js' => assets_url('plugins/respond.min.js'),
            'jquery_slimscroll_js' => assets_url('plugins/jquery-slimscroll/jquery.slimscroll.min.js'),
            'jquery_blockui_js' => assets_url('plugins/jquery.blockui.min.js'),
            'jquery_cookie_js' => assets_url('plugins/jquery.cookie.min.js'),
            'jquery_uniform_js' => assets_url('plugins/uniform/jquery.uniform.min.js'),
            'jquery_validation_js' => assets_url('plugins/jquery-validation/dist/jquery.validate.min.js'),
            'jquery_backstretch_js' => assets_url('plugins/backstretch/jquery.backstretch.min.js'),
            'select2_js' => assets_url('plugins/select2/select2.min.js'),
            'app_js' => assets_url('scripts/app.js'),
            'login_soft_js' => assets_url('scripts/login.js'),
            'logo_bio_png' => assets_url('img/kop.png'),
            'swal_js' => assets_url('plugins/sweetalert/dist/sweetalert.min.js'),
        ];
        
        $rules = $this->user_m->rules_login;
        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == TRUE || $this->is_logged_in() == TRUE) {
            // Try login

            if (parent::login($this->input->post('userid'), $this->input->post('password')) == TRUE) {
                redirect($this->session->userdata('user_type') . '/dashboard');
            }
            else {
                $this->data['error'] = 'Invalid login! Your username or password is incorrect.';
                //redirect('public/user/login', 'refresh');
                $this->session->sess_destroy();
                //die;
            };
        }                    
        $this->load->view('public/user/login', $this->data);
    }

    public function logout() {
        parent::logout();
        redirect('public/user/login');
    }

}