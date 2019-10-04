<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Pxmenu extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'table_name' if it exists
        $this->dbforge->drop_table('pxmenu', true);

        // Table structure for table 'table_name'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'title' => array(
                'type' => 'varchar',
                'constraint' => '255',
                'null' => true,
            ),
            'url' => array(
                'type' => 'varchar', 
                'constraint' => '255',
                'null' => true,
            ),
            'icon' => array(
                'type' => 'varchar', 
                'constraint' => '255',
                'null' => true,
            ),
            'ismain_menu' => array(
                'type' => 'integer', 
                'constraint' => '11',
                'null' => true,
            ), 
            'isaktif'=> array(
                'type' => 'smallint', 
                'constraint' => '1',
                'default' => '1',
                'null' => true,
            ), 
            'position' => array(
                'type' => 'integer', 
                'constraint' => '11',
                'null' => true,
            ),
            'registerdate' => array(
                'type' => 'timestamp',                                
                'null' => true,
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('pxmenu');
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('pxmenu', true);
    }
}