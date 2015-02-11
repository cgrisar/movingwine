<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model {

	//

    public function slots()
    {
        return $this->hasMany('App\Movingwine\Slot');
    }

    public function addresses()
    {
        return $this->hasMany('App\Movingwine\Addresses');
    }

    public function relationshipType()
    {
        return $this->belongsTo('App\Movingwine\RelationshipType');
    }

}