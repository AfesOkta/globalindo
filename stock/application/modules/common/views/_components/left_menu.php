


<ul class="page-sidebar-menu">
    <li>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"></div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        &nbsp;
    </li>    
    <li class="start active ">
        <a href="dashboard">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
        </a>
    </li>
    
        
        <?php
        // chek settingan tampilan menu
        $setting = $this->db->get_where('pxconfig',array('config'=>'show menu'))->row_array();
        if($setting['value']=='ya'){
            // cari level user
            $id_user_level = $this->session->userdata('id_user_level');
            if ($id_user_level == "") {
                $id_user_level = 0;
            }
            $sql_menu = "
              SELECT * 
              FROM pxmenu 
              WHERE id 
                in(
                    select id_menu 
                    from pxusermenu 
                    where group_user = $id_user_level
                    ) 
                and ismain_menu= 0 
                and isaktif    = '1' 
            ORDER BY position asc";
        }else{
            $sql_menu = "select * from pxmenu where isaktif='1' and ismain_menu=0 order by position asc";
        }

        $main_menu = $this->db->query($sql_menu)->result();

        foreach ($main_menu as $menu){
            // chek is have sub menu
            $this->db->where('ismain_menu',$menu->id_menu);
            $this->db->where('isaktif','1');
            $this->db->order_by('position');
            $submenu = $this->db->get('pxmenu');
            if($submenu->num_rows()>0){
                // display sub menu
                echo "<li class='treeview'>
                        <a href='#'>
                            <i class='$menu->icon'></i> <span>".strtoupper($menu->title)."</span>
                            <span class='pull-right-container'>
                                <i class='fa fa-angle-left pull-right'></i>
                            </span>
                        </a>
                        <ul class='treeview-menu' style='display: none;'>";
                        foreach ($submenu->result() as $sub){
                            echo "<li>".anchor($sub->url,"<i class='$sub->icon'></i> ".strtoupper($sub->title))."</li>"; 
                        }
                        echo" </ul>
                    </li>";
            }else{
                // display main menu
                echo "<li>";
                echo anchor($menu->url,"<i class='".$menu->icon."'></i> 
                    <span class='title'>".strtoupper($menu->title)."</span");
                echo "</li>";
            }
        }
        ?>        
</ul>
