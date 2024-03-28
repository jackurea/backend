<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Repository\AuthRepository;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected $authRepo;

    public function  __construct (AuthRepository $authRepo) {
        $this->authRepo = $authRepo;
    }

    function login(Request $request) {
        $data = $this->authRepo->login($request);
        return response($data)        
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', '*')
        ->header('Access-Control-Allow-Credentials', true)
        ->header('Access-Control-Allow-Headers', 'X-Requested-With,Content-Type,X-Token-Auth,Authorization')
        ->header('Accept', 'application/json');
    }

    function register(Request $request) {
        $name = $request->name;
        $pwd = $request->pwd;

        return $this->authRepo->register($request);
    }

    function forget(Request $request) {
        return $this->authRepo->forget($request);
    }

    function reset(Request $request) {
        return $this->authRepo->reset($request);
    }
}
