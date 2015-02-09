<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model {

	//

    protected $fillable = ['name', 'address', 'zip', 'county', 'country', 'tel', 'email', 'contact'];

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }

}
