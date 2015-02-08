<?php
/**
 * Created by PhpStorm.
 * User: charlesgrisar
 * Date: 8/02/15
 * Time: 17:39
 */

namespace App\Http\Controllers;


use App\Address;
use App\Warehouse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class WarehouseController extends Controller {

    public function index()
    {
        return view('warehouse.index');
    }

    public function create()
    {
        return view('warehouse.create');
    }


    public function store()
    {
        // save the name of the warehouse
        $warehouse = Warehouse::create(Input::only('name'));

        // save the address of the warehouse
        $warehouse->address(Address::create(Input::only('address')));
        // save the address type of the address of the warehouse

        return redirect('/warehouses');
    }

}