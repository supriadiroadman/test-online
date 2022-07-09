<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $shop = Shop::all();
        return response()->json([
            'status' => 'success',
            'shop' => $shop,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'createddate' => 'required',
            'name' => 'required',
        ]);

        $shop = Shop::create([
            'createddate' => $request->createddate,
            'name' => $request->name,
        ]);

        return response()->json([
            'data' => [
                'createddata' => $shop->created_date,
                'name' => $shop->name,
            ]
        ], 200);
    }


    public function show($id)
    {
        $shop = Shop::find($id);
        return response()->json([
            'status' => 'success',
            'shop' => $shop,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'createddate' => 'required',
            'name' => 'required',
        ]);

        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->createddate = $request->createddate;
        $shop->save();

        return response()->json([
            'status' => 'success',
            'todo' => $shop,
        ]);
    }

    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();

        return response()->json([
            'status' => 'success',
            'shop' => $shop,
        ]);
    }
}
