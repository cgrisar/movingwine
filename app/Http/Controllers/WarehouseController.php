<?php
/**
 * Created by PhpStorm.
 * User: charlesgrisar
 * Date: 8/02/15
 * Time: 17:39
 */

namespace App\Http\Controllers;


use App\Address;
use App\Http\Requests\WarehouseRequest;
use App\Warehouse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class WarehouseController extends Controller {

    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouse.index', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouse.create');
    }


    /**
     * @param WarehouseRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(WarehouseRequest $request)
    {
        $warehouse = Warehouse::create($request->all());

        return redirect('warehouses');
    }

}