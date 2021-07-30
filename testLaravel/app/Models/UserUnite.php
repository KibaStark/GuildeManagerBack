<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserUnite extends Model
{
    protected $fillable = ['user_id', 'unite_id', 'level'];

    public static function createUserUnite($user_id, $unite_id, $level){
        $userUnite = new UserUnite;
        $userUnite->user_id = $user_id;
        $userUnite->unite_id = $unite_id;
        $userUnite->level = $level;
        $userUnite->save();
    }
}