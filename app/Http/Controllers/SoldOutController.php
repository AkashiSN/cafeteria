<?php

namespace App\Http\Controllers;

use Log;
use App\Models\SoldOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SoldOutController extends Controller
{
    public function store(Request $request, $menu_id)
    {
        $sold_out = SoldOut::where('menu_id', $menu_id) -> first();
        if (!$sold_out -> exists) {
            $status = 500;
            return response() -> json([
                'status' => $status,
                'errors' => 'Menu does not exist'
            ], $status);
        }

        $sold_out -> sold_out = $request -> sold_out;
        $sold_out -> save();

        $status = 200;
        return response() -> json([
            'status' => $status,
        ], $status);
    }
}
