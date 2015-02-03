<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	//

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }

}
