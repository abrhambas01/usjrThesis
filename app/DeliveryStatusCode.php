<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatusCode extends Model
{
	protected $table  = 'delivery_status_codes' ;

	public $timestamps = false;

	public function deliveryStatus() {
		return $this->hasMany(Parcel::class);
	}
}
