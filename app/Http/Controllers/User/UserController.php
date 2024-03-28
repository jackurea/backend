<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\UserRepository;

class UseController extends Controller {

    /**
     * Resource Endpoint
     */

     protected $repo;

     public function __construct(UserRepository $repo) {
        $this->repo = $repo;
     }

     function listUser() {
        $data = $this->repo->list();
        return $data;        
     }

     /**
      * Edit Custom User
      */
     function editUser(Request $request) {
        $data = $this->repo->edit($request);
        return $data;
     }

     /**
      * Delete Custom User
      */

     function deleteUser($name, Request $request) {
        $data = $this->repo->delete($name);
        return $data;
     }
}