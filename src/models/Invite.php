<?php

namespace weeat\models;

class Invite extends \Illuminate\Database\Eloquent\Model {

	protected $table = 'invite';
	protected $primaryKey = 'id_invite';
	public $timestamps = false;
}