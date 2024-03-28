<?php

namespace App\Repository;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthRepository {

    const MODEL = Auth::class;

    public function __construct() {

    }

    function login(Request $request) {
        $user = self::MODEL;
        $user = new $user;
        $name = $request->name;

        $data = $user->where('name', '=', $name)->select('name', 'password')->get(); 
        if(!empty($data) && count($data) != 0)
            return "OK";
        return "FAIL";
    }

    function register(Request $request) {
        $user = self::MODEL;
        $user = new $user;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->role = '12';

//        DB::transaction(function() use ($user) {
            $user->save();
//        });
        return "OK";
    }

    function forget(Request $request) {
        $user = self::MODEL;
        $user = new $user;
        $user->name = $request->name;
        $hash = md5($request->name . Carbon::now());
        $user->resetToken = $hash;
        $user->save();

        return $hash;

    }

    function reset(Request $request) {

        $name = $request->name;
        $password = $request->password;

        DB::table('user')->where('name', '=', $name)->update(['password' => $password]);
        return "OK";
    }
}