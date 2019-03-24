<?php

namespace weeat\models;

class Favori extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'favori';
	protected $primaryKey = 'id_favori';
	public $timestamps = false;

	public function role() {
		return $this->belongsTo('weeat\models\Restaurant', 'id_restaurant');
	}

	public function role2() {
		return $this->belongsTo('weeat\models\Utilisateur', 'id_utilisateur');
	}

}