<?php

namespace weeat\models;

class Restaurant extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'restaurant';
	protected $primaryKey = 'id_restaurant';
	public $timestamps = false;


public function restaurants() {
		return $this->hasMany('weeat\models\Plat', 'id_restaurant');
	}

	public function restaurants2() {
		return $this->hasMany('weeat\models\Favori', 'id_restaurant');
	}
}
