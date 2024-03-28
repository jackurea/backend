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
        return response($data)->withHeaders([
            'Content-Type' => 'application/json',
            'Access-Control-Allow-Origin' => '*']);
    }

    function register(Request $request) {
        $name = $request->name;
        $pwd = $request->pwd;

        return $this->authRepo->register($request);
    }


}
