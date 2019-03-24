<?php

namespace weeat\models;

class Panier extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'panier';
	protected $primaryKey = 'id_panier';
	public $timestamps = false;

	public function role() {
		return $this->belongsTo('weeat\models\Utilisateur', 'id_utilisateur');
	}

	public function role2() {
		return $this->belongsTo('weeat\models\Plat', 'id_plat');
	}

}

