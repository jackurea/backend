<?php

namespace App\Repository;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserRepository {

    const MODEL = Auth::class;

    public function __construct() {

    }

    public function list() {
        $data = DB::table('user')->get();
        return $data;
    }

    public function edit(Request $request) {
        $name = $request->name;
        $password = $request->password;
        $role = $request->role;
        DB::table('user')->where('name', '=', $name)->update(['name' => $name, 'password' => $password, 'role' => $role]);
        return "OK";
    }

    public function delete($name) {
        DB::table('user')->where('name', '=', $name)->delete();
        return "OK";
    }
}