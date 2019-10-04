<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Table_Pxusermenu extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'table_name' if it exists
        $this->dbforge->drop_table('pxusermenu', true);

        // Table structure for table 'table_name'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'id_menu' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true,
            ),
            'group_user' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true,
            ),
            'registerdate' => array(
                'type' => 'timestamp',
                'null' => true,
            ),
            'modifydate' => array(
                'type' => 'timestamp',
                'null' => true,
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->add_key('group_user', true);
        $this->dbforge->create_table('pxusermenu');
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('pxusermenu', true);
    }
}