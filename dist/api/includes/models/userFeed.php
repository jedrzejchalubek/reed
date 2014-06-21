<?php

/*
 | ------------------------------------------
 | Article Model Class
 | ------------------------------------------
 | General class for access articles data
*/

namespace Reed\Models;

class UserFeed extends Model
{

	/**
	 * Database table name
	 * @var String
	 */
	protected $table = 'userFeed';

	/**
	 * Database table columns
	 * @var String
	 */
	protected $columns = 'id, feedid, folder, created';

	/**
	 * Fetch all user articles
	 * @param  String $id User id
	 * @return Array
	 */
	public function get($id)
	{

		return $this->request("SELECT * FROM {$this->table} UF INNER JOIN feed F ON UF.feedid = F.id WHERE UF.id = :id", array(
				'id' => $id
			));

	}

	/**
	 * Remove user feed
	 * @param  String $userid
	 * @param  String $feedid
	 */
	public function delete($userid, $feedid)
	{

		$this->request("DELETE FROM {$this->table} WHERE id = :id AND feedid = :feedid", array(
			'id' => $userid,
			'feedid' => $feedid
		), false);

	}

	/**
	 * Construct
	 * Dependency injection
	 * @param Object $db Database
	 */
	function __construct(Database $db)
	{
		$this->db = $db;
	}

}
