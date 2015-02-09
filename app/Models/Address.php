<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

	//

    protected $fillable = ['address', 'zip', 'county', 'country', 'phone', 'email', 'contact'];

    public function relationship()
    {
        return $this->belongsTo('App\Models\Relationship');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function addressType()
    {
        return $this->belongsTo('App\Models\AddressType');
    }

}
