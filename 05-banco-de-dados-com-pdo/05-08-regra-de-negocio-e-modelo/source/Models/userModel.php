<?php

namespace Source\Models;
use \Source\Models\Model;

class userModel extends Model
{
    /* @var array $safe no update or delete */
	protected static $safe = ["id","created_at","updated_at"];

    /* @var string $entity */
	protected static $entity = "users";

	public function bootstrap()
	{

	}

	public function load($id)
	{

	}

	public function find($email)
	{

	}

	public function all($limit = 30, $offset = 0)
	{

	}

	public function save()
	{

	}

	public function destroy()
	{

	}

	public function required()
	{
		
	}

}

?>