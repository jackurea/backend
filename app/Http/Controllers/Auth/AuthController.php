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

    /**
     * Login endpoints validates request
     * Return resetToken if user is authenticated
     * @param string name
     * @param string password
     * @return string resetToken
     */

    function login(Request $request) {
        $data = $this->authRepo->login($request);
        return response($data)        
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', '*')
        ->header('Access-Control-Allow-Credentials', true)
        ->header('Access-Control-Allow-Headers', 'X-Requested-With,Content-Type,X-Token-Auth,Authorization')
        ->header('Accept', 'application/json');
    }

    /**
     * Register endpoints validates request
     * Return ok if user is registered
     * @param string name
     * @param string password
     * @return boolean 
     */

    function register(Request $request) {
        $name = $request->name;
        $pwd = $request->pwd;

        return $this->authRepo->register($request);
    }


    /**
     * forget endpoints
     * Return resetToken
     * @param string name
     * @return string resetToken
     */

     function forget(Request $request) {
        return $this->authRepo->forget($request);
    }

    /**
     * Reset endpoints
     * @param string name
     * @param string password
     */

    function reset(Request $request) {
        return $this->authRepo->reset($request);
    }

}
