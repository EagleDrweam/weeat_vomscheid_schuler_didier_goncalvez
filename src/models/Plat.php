<?php

namespace weeat\models;

class Plat extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'plat';
	protected $primaryKey = 'id_plat';
	public $timestamps = false;

	public function role() {
		return $this->belongsTo('weeat\models\Restaurant', 'id_restaurant');
	}

	public function plats() {
		return $this->hasMany('weeat\models\Panier', 'id_plat');
	}
}

