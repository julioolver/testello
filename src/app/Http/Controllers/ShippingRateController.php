<?php

namespace App\Http\Controllers;

use App\Models\ShippingRate;
use Illuminate\Http\Request;

class ShippingRateController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $shippingRate = ShippingRate::create($request->all());

        return $shippingRate;
    }

    public function show(Request $request)
    {
        $id = $request->route('id');
        $shippingRate = ShippingRate::find($id);

        dd($shippingRate);
    }
}
