<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Table_Pxusergroup extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'table_name' if it exists
        $this->dbforge->drop_table('pxusergroup', true);

        // Table structure for table 'table_name'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'description' => array(
                'type' => 'varchar',
                'constraint' => '100',
                'null' => true,
            ),
            'isactive' => array(
                'type' => 'smallint',
                'constrains' => '1',
                'default' => '1',
                'null' => true,
            ),            
            'registerdate' => array(
                'type' => 'timestamp',
                'null' => true,
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('pxusergroup');
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('pxusergroup', true);
    }
}