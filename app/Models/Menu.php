<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $fillable = ['title', 'price', 'weight', 'amount_of_meat', 'about'];

    public function restaurants(){
        return $this->hasMany('App\Models\Restaurant');
    }

}
