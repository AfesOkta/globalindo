<?php
class pxmenu_m extends MY_Model
{
    protected $_table_name           = 'pxmenu';
    protected $_order_by             = 'id';
    protected $_save_timestamp_field = 'register_date';

    public $rules = array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required'
        ),
        'url' => array(
            'field' => 'url',
            'label' => 'Url',
            'rules' => 'trim|required'
        ),
        'icon' => array(
            'field' => 'icon',
            'label' => 'Icon',
            'rules' => 'trim|required'
        )
    );
}
