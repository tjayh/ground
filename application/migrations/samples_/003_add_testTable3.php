<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_testTable3 extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
           array(
              'id' => array(
                 'type' => 'INT',
                 'constraint' => 5,
                 'unsigned' => true,
                 'auto_increment' => true
              ),
              'name' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '100',
              ),
              'email' => array(
                 'type' => 'TEXT',
                 'null' => true,
              ),
           )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('testTable3');
    }

    public function down()
    {
        $this->dbforge->drop_table('testTable3');
    }
}