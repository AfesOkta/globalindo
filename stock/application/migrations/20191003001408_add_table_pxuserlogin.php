<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Table_Pxuserlogin extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'table_name' if it exists
        $this->dbforge->drop_table('pxuserlogin', true);

        // Table structure for table 'table_name'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'userid' => array(
                'type' => 'varchar',
                'constrains' => 20,
                'default' => 'null',
                'null' => false,
            ),
            'password' => array(
                'type' => 'varchar',
                'constrains' => 200,
                'default' => 'null',
                'null' => false,
            ),
            'email' => array(
                'type' => 'varchar',
                'constrains' => 100,
                'null' => true,
            ),
            'first_name' => array(
                'type' => 'varchar',
                'constrains' => 50,
                'null' => true,
            ),
            'last_name' => array(
                'type' => 'varchar',
                'constrains' => 50,
                'null' => true,
            ),
            'images' => array(
                'type' => 'varchar',
                'constrains' => 255,
                'null' => true,
            ),
            'group_user' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
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
        $this->dbforge->create_table('pxuserlogin');
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('pxuserlogin', true);
    }
}