<?php
use App\AddressType;

/**
 * Created by PhpStorm.
 * User: charlesgrisar
 * Date: 9/02/15
 * Time: 23:04
 */

class AddressTypeSeeder extends Seeder
{
    public function run()
    {
        $addressType = new AddressType;
        $addressType->name = 'Invoice';
        $addressType->save();

        $addressType = new AddressType;
        $addressType->name = 'Reminder';
        $addressType->save();

        $addressType = new AddressType;
        $addressType->name = 'Goods In';
        $addressType->save();

        $addressType = new AddressType;
        $addressType->name = 'Goods Out';
        $addressType->save();

    }
}