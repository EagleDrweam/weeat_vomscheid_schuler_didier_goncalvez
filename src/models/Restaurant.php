<?php

namespace weeat\models;

class Restaurant extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'restaurant';
	protected $primaryKey = 'id_restaurant';
	public $timestamps = false;
}
