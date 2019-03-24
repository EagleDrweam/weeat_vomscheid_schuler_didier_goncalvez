<?php

namespace weeat\models;

class Utilisateur extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'utilisateur';
	protected $primaryKey = 'id_utilisateur';
	public $timestamps = false;


public function utilisateurs() {
		return $this->hasMany('weeat\models\Post', 'id_utilisateur');
	}


public function utilisateurs2() {
		return $this->hasMany('weeat\models\Panier', 'id_utilisateur');
	}

	public function utilisateurs3() {
		return $this->hasMany('weeat\models\Favori', 'id_utilisateur');
	}
}