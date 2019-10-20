<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_New_Pxconfig_Table extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'table_name' if it exists
        $this->dbforge->drop_table('pxconfig', true);

        // Table structure for table 'table_name'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'config' => array(
                'type' => 'Varchar',
                'constraint' => '50',
                'null' => false ),
            'value' => array(
                'type' => 'Varchar',
                'constraint'=> '40',
                'null'=> false ),
            'register_date' => array(
                'type' => 'timestamp',
                'null' => false,
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('pxconfig');
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('pxconfig', true);
    }
}