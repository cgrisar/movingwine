<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

	//

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Æddresses');
    }

}
