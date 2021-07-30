<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unites extends Model
{
    public static function getUnites() {
        return self::all();
    }
}