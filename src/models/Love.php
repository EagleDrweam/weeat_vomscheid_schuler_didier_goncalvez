<?php

namespace weeat\models;

class Love extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'love';
	protected $primaryKey = 'id_love';
	public $timestamps = false;

	public function role() {
		return $this->belongsTo('weeat\models\Utilisateur', 'id_utilisateur');
	}
}