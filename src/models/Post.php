<?php

namespace weeat\models;

class Post extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'post';
	protected $primaryKey = 'id_Post';
	public $timestamps = false;

	public function role() {
		return $this->belongsTo('weeat\models\Utilisateur', 'id_utilisateur');
	}
}

