<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model {

	//

    protected $fillable = ['name'];

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }

    public function currentCustomer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }
}
