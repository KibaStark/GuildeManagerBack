<?php
namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\UserUnite;
use App\Models\Unites;

class UsersController extends Controller {
    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pseudo' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required',
            ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $user = Users::create([
                'pseudo' => request('pseudo'),
                'email' => request ('email'),
                'password' => bcrypt(request('password'))
            ]);
            
            self::boucleUniteId($user->id);

        }
        catch(Error $e) {
            print 'Veuillez entrer une adresse email et un mot de passe valide';
        }
        
    }

    public function boucleUniteId($user_id) {
        $uniteToCreate = Unites::getUnites();
        foreach ($uniteToCreate as $unite){
            UserUnite::createUserUnite($user_id, $unite->id, 0);
        }
        return $uniteToCreate;
    }

    public function getUser($grade)
    {
        return Users::where('grade', $grade)
                    ->get();
    }


    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
            ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $email = $request->input('email');
     $password = $request->input('password');
     $user = Users::where('email', '=', $email)->first();
     if (!$user) {
        return response()->json(['success'=>false, 'message' => 'entre une adresse e-mail valide'], 400);
     }
     if (!Hash::check($password, $user->password)) {
        return response()->json(['success'=>false, 'message' => 'mauvais mot de passe'], 400);
     }
        return response()->json(['success'=>true ,'message'=>'connection reussie', 'data' => $user]);
    }
}
