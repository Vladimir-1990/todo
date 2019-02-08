<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

Class UserController extends Controller{

    /**
    * User model
    * @var object
    */
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    /**
    * User login
    * @return JSON
    */
    public function login(Request $request){
        $this->validate($request, [
             "email" => "required",
             "password" => "required"
        ]);
        $user = $this->user->getByEmail($request->input("email"));
        if(Hash::check($request->input("password"), $user->password)){
            $apiToken = bin2hex(random_bytes(16));
            $this->user->update($user->id, ["api_token"=>$apiToken]);
            return json_encode(["status" => true, "api_token" => $apiToken]);
        }
        return json_encode(["status" => false]);
    }

}
