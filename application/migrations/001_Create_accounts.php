<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Migrations
 *
 * An open source utility for CodeIgniter inspired by Ruby on Rails
 *
 * @package	Migrations
 * @author	Mat'as Montes
 *
 * Rewritten by:
 *
 * 	Phil Sturgeon
 *	http://philsturgeon.co.uk/
 *
 *  and
 *
 * 	Spicer Matthews <spicer@cloudmanic.com>
 * 	Cloudmanic Labs, LLC
 *	http://www.cloudmanic.com/
 *
 */

// ------------------------------------------------------------------------

/**
 * Migrations Package
 *
 * Minor modifications and structural changes to make into a package for use in
 * CodeIgniter v2.0.
 *
 * @author	John Snyder
 */

// ------------------------------------------------------------------------

/**
 * Example migration
 */
class Migration_Create_accounts extends Migration {

	/**
	 * Migrate to this version
	 *
	 * @access	public
	 * @see 	Migration::up()
	 * @return	void
	 */
	public function up()
	{
		$this->migrations->is_verbose() AND print "Creating table accounts...";

		if ( ! $this->db->table_exists('accounts'))
		{
			// Setup Keys
			$this->dbforge->add_key('id', TRUE);

			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'constraint' => 5, 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'company_name' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
				'first_name' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
				'last_name' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE),
				'phone' => array('type' => 'TEXT', 'null' => FALSE),
				'email' => array('type' => 'TEXT', 'null' => FALSE),
				'address' => array('type' => 'TEXT', 'null' => FALSE),
				'Last_Update' => array('type' => 'DATETIME', 'null' => FALSE)
			));

			$this->dbforge->add_field("Created_At TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			$this->dbforge->create_table('accounts', TRUE);
		}
	}

	/**
	 * Undo this migration
	 *
	 * @access	public
	 * @see 	Migration::down()
	 * @return	void
	 */
	public function down()
	{
		$this->migrations->is_verbose() AND print "Dropping table accounts...";

		$this->dbforge->drop_table('accounts');
	}
}