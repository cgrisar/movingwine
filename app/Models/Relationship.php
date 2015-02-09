<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model {

	//

    public function slots()
    {
        return $this->hasMany('App\Models\Slot');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Addresses');
    }

    public function relationshipType()
    {
        return $this->belongsTo('App\Models\RelationshipType');
    }

}
