<?php

namespace App\Http\Controllers;

use App\Models\UserUnite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserUniteController extends Controller {
    
    public function index()
    {
        return UserUnite::get();
    }

    public function getUnite($user_id)
    {
        $userUnite = UserUnite::join('unites', 'unites.id', '=' , 'user_unites.unite_id')
            ->join('users', 'users.id', '=' , 'user_unites.user_id')
            ->where('user_unites.user_id', '=', $user_id)
            ->select('unites.*', 'user_unites.*')
            ->get();
            return $userUnite;

    }


    public function createUserUnite(Request $request)
    {
        $unite = UserUnite::create([
            'user_id' => $request->user_id,
            'unite_id' => $request->unite_id,
            'level' => 1
        ]);
    }

    public function userBox ($user_id, $unite_id, $level)
    {
        return UserUnite::where('user_id', $user_id)
                         ->where('unite_id', $unite_id)
                         ->where('level', $level)
                         ->get();
    }
    
    public function sessionUniteLevel (Request $request)
    {
        try {
        $uniteLevel = UserUnite::find($request->iD);
        $uniteLevel->level = $request->levelUp;
        $uniteLevel->save();
        }
        catch (exception $e) {
            $e->getMessage();
        }
    }

}