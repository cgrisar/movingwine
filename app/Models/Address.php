<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

	//

    protected $fillable = ['address'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse');
    }

    public function addressType()
    {
        return $this->belongsTo('App\Models\AddressType');
    }
}
