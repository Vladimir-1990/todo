<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

Class Items extends Model implements ItemsInterface{

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
        $this->table = "items";
        $this->columns = ["user_id", "content", "created_at", "updated_at"];
    }

    /**
     * @inheritdoc
     */
    public function all($userId){
        try {
            $results = DB::table($this->table)->where("user_id", $userId)->get();
        } catch (\Throwable $e) {
            $results = false;
        }

        return self::return($results);
    }

    /**
     * @inheritdoc
     */
    public function get($id){
        try {
            $result = DB::table($this->table)->where('id', $id)->get();
        } catch (\Throwable $e) {
            $result = false;
        }

        return self::return($result);
    }

    /**
     * @inheritdoc
     */
    public function create($content){
        $data["user_id"] = 1;
        $data["content"] = $content;
        $data["created_at"] = time();
        $data["updated_at"] = time();

        foreach($this->columns as $column) {
            $insertData[$column] = $data[$column];
        }

        try {
            DB::table($this->table)->insert($insertData);
            $response = true;
        } catch (\Throwable $e) {
            $response = false;
        }

        return self::return($response);
    }

    /**
     * @inheritdoc
     */
    public function delete($id){
        try {
            $result = DB::table($this->table)->where("id", $id)->delete();
            $response = true;
        } catch (\Throwable $e) {
            $response = false;
        }

        return self::return($response);
    }

    /**
     * @inheritdoc
     */
    public function markDone($id){
        $data = ["done" => 1];
        try {
            $result = DB::table($this->table)->where("id", $id)->update($data);
            $response = true;
        } catch (\Throwable $e) {
            $response = false;
        }

        return self::return($response);
    }

}
