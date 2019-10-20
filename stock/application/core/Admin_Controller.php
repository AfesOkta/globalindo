<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
class Admin_Controller extends Authenticated_Controller {
    public $context = 'admin';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('role_m');
        $this->load->model('pxmenu_m');
        $this->data['meta_title'] = 'Admin Paneli';
        $this->data['useDatatables'] = FALSE;

        $this->data['modules'] = array(
            'dashboard' =>  array('title'    => 'Dashboard',  
                                  'icon'     => 'dashboard',
                                  'perm_req' => FALSE),
            'tree' =>       array('title'    => 'Paketler',
                                  'icon'     => 'paket.png',
                                  'perm_req' => FALSE),
            'member' =>     array('title'    => 'Ortak Yönetimi', 
                                  'icon'     => '',
                                  'perm_req' => TRUE),
            'package' =>    array('title'    => 'Paketler 1',
                                  'icon'     => 'paket.png',
                                  'perm_req' => TRUE)
        );
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
            'jquery_gritter_css' => assets_url('plugins/gritter/css/jquery.gritter.css'),
            'daterangepicker_css' => assets_url('plugins/bootstrap-daterangepicker/daterangepicker.css'),
            'fullcalendar_css' => assets_url('plugins/fullcalendar/fullcalendar/fullcalendar.css'),
            'jqvmap_css' => assets_url('plugins/jqvmap/jqvmap/jqvmap.css'),
            'jquery_pie_chart_css' => assets_url('plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css'),
            'task_css' => assets_url('css/pages/tasks.css'),
            'bootstrap_js' => assets_url('js/bootstrap.min.js'),
            'jquery_js' => assets_url('plugins/jquery-1.10.1.min.js'),            
            'jquery_migrate_js' => assets_url('plugins/jquery-migrate-1.2.1.min.js'),
            'jquery_ui_js' => assets_url('plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js'),
            'twitter_bootstrap_hover_dropdown_js' => assets_url('plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js'),
            'excanvas_js' => assets_url('plugins/excanvas.min.js'),
            'respond_js' => assets_url('plugins/respond.min.js'),
            'jquery_slimscroll_js' => assets_url('plugins/jquery-slimscroll/jquery.slimscroll.min.js'),
            'jquery_blockui_js' => assets_url('plugins/jquery.blockui.min.js'),
            'jquery_cookie_js' => assets_url('plugins/jquery.cookie.min.js'),
            'jquery_uniform_js' => assets_url('plugins/uniform/jquery.uniform.min.js'),
            'jqvmap_js' => assets_url('plugins/jqvmap/jqvmap/jquery.vmap.js'),
            'jqvmap_rusia_js' => assets_url('plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js'),
            'jqvmap_world_js' => assets_url('plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js'),
            'jqvmap_europe_js' => assets_url('plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js'),
            'jqvmap_germany_js' => assets_url('plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js'),
            'jqvmap_sampledata_js' => assets_url('plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js'),
            'jqvmap_usa_js' => assets_url('plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js'),
            'jquery_flot_js' => assets_url('plugins/flot/jquery.flot.js'),
            'jquery_flot_resize_js' => assets_url('plugins/flot/jquery.flot.resize.js'),
            'jquery_pulsate_js' => assets_url('plugins/jquery.pulsate.min.js'),
            'bootstrap_daterangepicker_js' => assets_url('plugins/bootstrap-daterangepicker/date.js'),
            'daterangepicker_js' => assets_url('plugins/bootstrap-daterangepicker/daterangepicker.js'),     
            'jquery_gritter_js' => assets_url('plugins/gritter/js/jquery.gritter.js'),
            'fullcalendar_js' => assets_url('plugins/fullcalendar/fullcalendar/fullcalendar.min.js'),
            'jquery_easy_pie_chart_js' => assets_url('plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js'),
            'jquery_sparkline_min_js' => assets_url('plugins/jquery.sparkline.min.js'),  
            'jquery_validation_js' => assets_url('plugins/jquery-validation/dist/jquery.validate.min.js'),
            'jquery_backstretch_js' => assets_url('plugins/backstretch/jquery.backstretch.min.js'),
            'select2_js' => assets_url('plugins/select2/select2.min.js'),
            'app_js' => assets_url('scripts/app.js'),
            'index_js' => assets_url('scripts/index.js'),
            'taks_js' => assets_url('scripts/tasks.js'),
            'swal_js' => assets_url('plugins/sweetalert/dist/sweetalert.min.js'),
        ];

        $this->check_permission();
        $this->data['active_module'] = $this->router->fetch_class();

        $leftmenu_base = array(
            array('title' => 'Ortaklar', 'subitems' => array(
                array('module' => 'member'),
                array('title' => 'Yeni Üyeler', 'module' => 'member', 'action' => 'new_members')
            )),
            array('module' => 'package')
        );


        $this->data['leftmenu'] = $this->filter_menu_items($leftmenu_base);
    }

    public function get_menu_all() {
        // cari level user
        $id_user_level = $this->session->userdata('group_user');
        if ($id_user_level == "") {
            $id_user_level = 0;
        }
        $sql = "
              SELECT * 
              FROM pxmenu 
              WHERE id
                in(
                    select id_menu 
                    from pxusermenu
                    where group_user = $id_user_level
                    ) 
                and is_main_menu= 0 
                and is_aktif    = '1' 
            ORDER BY urutan asc";

        $result = $this->db->query($sql);

        return $result->result_array();
    }
}