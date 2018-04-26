<?php

class Atividade extends Model{

	protected $table = 'atividade';
	protected $id = 'id';

	protected $fillable = ['nome', 'descricao','data_inicio', 'data_fim', 'status_id', 'situacao'];

	protected $timestamp = true;

	public function __construct()
	{
		parent::__construct();
	}
}