<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Add_testTable extends CI_Migration
{
    public function up()
    {
        $fields = array(
		  'qwerty' => array(
			 'type' => 'TEXT',
			 'null' => true,
		  ),
		  'asdfgh' => array(
			 'type' => 'TEXT',
			 'null' => true,
		  ),
	   );
		$this->dbforge->modify_column('testTable', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_table('testTable');
    }
}