<?php

namespace weeat\models;

class Utilisateur extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'utilisateur';
	protected $primaryKey = 'id_utilisateur';
	public $timestamps = false;


public function utilisateurs() {
		return $this->hasMany('weeat\models\Post', 'id_utilisateur');
	}
}