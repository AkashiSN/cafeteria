<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\http\Requests;
use App\User;
use App\Models\Menu;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuEditController extends Controller
{
    private $categories = array(
        'a_set_menu'     => 'Aセット（ライス・味噌汁付）',
        'b_set_menu'     => 'Bセット（味噌汁付）',
        'permanent_menu' => '常設メニュー',
        'ramen'          => '常設メニュー（ラーメン）',
        'summer_menu'    => '夏限定メニュー',
    );

    public function menuregister(){
        $categories = $this -> categories;
        return view('menus.menuregister', compact('categories'));
    }
    public function menuset(){
        return view('menus.menuset');
    }
    public function confirm(Request $request){
        // $categories = $this -> categories;
        // $data = $request->all();
        // return view('menus.menuconfirm', compact('categories', 'data'))->with($data);
        
        /////////////////////////////////////////////////////////
        // if (!Auth::check()) {
        //     return view('menus.menuregister');
        // }

        $data = $request->all();

        // $menu = Menu::where('menu_id', $menu_id)->first();
        // if (!$menu->exists) {
        //     return view('reviews.review', ['menu_id' => $menu_id, 'message' => "menu"]);
        // }

        // $user = Auth::user();s
        // $user_id = $user -> user_id;

        $menu = array(
            "menu_id" => Menu::all() -> max('menu_id') + 1,
            "item_name" => $data['menuname'],
            "category" => $data['select'],
            "price" => $data['price'],
            "energy" => $data['energy'],
            "protein" => $data['protein'],
            "lipid" => $data['lipid'],
            "salt" => $data['salt'],
            "alias" => 0
        );
         
        Menu::create($menu);
        return redirect() -> route('menuregister');
    }
}
