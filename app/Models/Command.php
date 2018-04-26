<?php

class Command extends Model{

	protected $table = 'commands';
	protected $id = 'id';

	public function __construct()
	{
		parent::__construct();
	}
}