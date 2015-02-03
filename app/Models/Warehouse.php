<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model {

	//

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }

}
