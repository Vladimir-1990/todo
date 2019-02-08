<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Items;

Class ItemsController extends Controller{

    /**
    * Items model
    * @var object
    */
    private $items;

    function __construct(Items $items){
        $this->items = $items;
    }

    public function all(){
        return $this->items->all(Auth::user()->id);
    }

    public function get(int $id){
        return $this->items->get($id);
    }

    public function delete($id){
        return $this->items->delete($id);
    }

    public function create(Request $request){
        $this->validate($request, [
             "content" => "required"
        ]);
        return $this->items->create($request->input("content"));
    }

    public function markDone(Request $request){
        return $this->items->markDone($request->input("id"));
    }

}
