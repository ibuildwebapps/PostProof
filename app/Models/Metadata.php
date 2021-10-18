<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Metadata extends Model {



	protected $table = 'metadata';
	public $timestamps = false ;

	public $fillable = [
				//'id', //(bigint(20) unsigned)
				'metadata_key', //(varchar(255))
				'metadata_value', //(varchar(255))
				'metadata_type', //(varchar(255))
				'fk_hit_id', //(bigint(20) unsigned)
				] ;


/**  One-to-Many Relations  **/

	public function Hit()
	{
		return $this->hasOne('App\Hit', 'id', 'fk_hit_id');
	}




/**  Many-to-One Relations  **/



}
