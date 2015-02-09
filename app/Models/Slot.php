<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model {

	//

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse');
    }

    public function relationship()
    {
        return $this->belongsTo('App\Models\Relationship');
    }

}
