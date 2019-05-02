<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/menu.json");
        $data = json_decode($json);
        foreach ($data as $obj){
            Menu::create(array(
                'item_name' => $obj->item_name,
                'category' => $obj->category,
                'price' => $obj->price,
                'energy' => $obj->energy,
                'protein' => $obj->protein,
                'lipid' => $obj->lipid,
                'salt' => $obj->salt,
            ));
        }
    }
}
