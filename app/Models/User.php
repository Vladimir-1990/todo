<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

Class User implements UserInterface{

    /**
    * Table name
    * @var string
    */
    protected $table;

    /**
    * Columns
    * @var array
    */
    protected $columns;

    public function __construct(){
        $this->table = "users";
        $this->columns = ["email", "password", "api_token", "created_at", "updated_at"];
    }

    public function getByEmail($email){
        try {
            $result = DB::table($this->table)->where("email", $email)->first();
        } catch (\Throwable $e) {
            $result = false;
        }

        return $result;
    }

    public function getByToken($apiToken){

        try {
            $result = DB::table($this->table)->where("api_token", $apiToken)->first();
        } catch (\Throwable $e) {
            $result = false;
        }

        return $result;
    }

    public function update($id, $data){
        try {
            $result = DB::table($this->table)->where("id", $id)->update($data);
            return true;
        } catch (\Throwable $e) {
            $result = false;
        }

        return $result;

    }

}
