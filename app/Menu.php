<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "item_name", "category", "price", "energy", "protein", "lipid", "salt"
    ];

    protected $primaryKey = 'menu_id';

    public $timestamps = false;

}
