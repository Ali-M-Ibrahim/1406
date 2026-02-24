<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function create1()
    {
        // First method to create a row in database
        $row = new Item();
        $row->title = "Title 1";
        $row->description = "Description 1";
        $row->price = 50;
        $row->save();
        return response(["success" => true],Response::HTTP_CREATED);
    }

    public function create2(){
        Item::create([
            'title'=>"title 2",
            'description'=>"description 2",
            'price'=>100,
        ]);
        return response(["success" => true],Response::HTTP_CREATED);
    }

    public function create3(){
        DB::table('items')
            ->insert(['title'=>'title 3','description'=>'description 3','price'=>100,
                'created_at'=>now(), "updated_at"=>now()]);
        return response(["success" => true],Response::HTTP_CREATED);
    }

    public function create4(Request $request){
        $row1 = new Item();
        $row1->title = $request->body_title;
        $row1->description = $request->body_description;
        $row1->price = $request->body_price;
        $row1->save();

        Item::create([
            'title'=>$request->body_title,
            'description'=>$request->body_description,
            'price'=>$request->body_price
        ]);
        return response(["success" => true],Response::HTTP_CREATED);

    }

    public function create5(Request $request){
        $row = Item::create($request->all());
        return response(["success" => true],Response::HTTP_CREATED);

    }


    public function getById($id){
        // SELECT * FROM ITEMS WHERE ID = ? ;
//        $row = Item::find($id);

        $row = Item::findOrFail($id);


//        $row = Item::findOr($id, function(){
//            return "1234567";
//        });
        return $row;
    }

    public function getAll()
    {
        // SELECT * FROM ITEMS;
        $all = Item::all();
        return $all;
    }

    public function getByCondition(){
        // 1 condition
        // select * from items where price = 100
        $row = Item::where('price',100)
            ->get();

        // select * from items where price >= 100
        $row = Item::where('price','>=',100)
            // and title = title1
            ->where('title','Title1')

            // when you use get, laravel will return array
            ->get();

            // when you use first, laravel will return first row that fit the conditions
//            ->first();

        return $row;
    }

    public function getByConditionOr(){
        $items = Item::where('price',100)
            ->orWhere('title','like','%API%')
            ->get();
        return $items;
    }

    public function getWhereIn(){
        // select * from items where id in (1,2,3);
        $items = Item::whereIn("id",[1,2,3])->get();

        // select * from items where id not in (1,2,3);
//        $items = Item::whereNotIn("id",[1,2,3])->get();

        return $items;
    }

    public function getBetween(){
        // select * from items where price between 100 and 200
        $items = Item::whereBetween('price',[100,200])->get();
        return $items;
    }

    public function getItemsOrderBy()
    {
        $items = Item::orderBy("price",'asc')->get();
        $items = Item::orderBy("price",'desc')->get();
        return $items;
    }

    public function getJoin()
    {

        $data = Patient::join('files','patients.id','files.patient_id')
            ->get();
        return $data;
    }

    public function getFields()
    {
        $item = Item::where('price','>',50)
            ->select(['title','description'])
            ->get();

        return $item;

    }


    public function update1(){
        $item = Item::find(1);
        $item->title = "updated Title";
        $item->description = "description updated";
        $item->save();
        return response(["success" => true],Response::HTTP_OK);
    }

    public function update2(Request $request){
        $item = Item::find(2);
        $item->fill($request->all());
        if($item->isClean()){
            return "no data changed";
        }
        $item->save();
        return response(["success" => true],Response::HTTP_OK);
    }

    public function updateOrCreate(){
        Item::updateOrCreate([
         'id'=> 100
        ],
        [
            'title'=>'update title 1 update or create',
            'description'=>'update description 1 update or create',
            'price'=>100,
        ]);
        return response(["success" => true],Response::HTTP_OK);
    }

    public function delete(){
        $item = Item::find(1);
        $item->delete();
        return response(["success" => true],Response::HTTP_OK);
    }

    public function statistics(){
        $maxId = Item::max('id');
        $minPrice = Item::min('price');
        $avgPrive = Item::avg('price');
        $countItem = Item::count('id');
        $sumPrice = Item::sum('price');

        return response([
            'maxId'=> $maxId,
            'minPrice'=> $minPrice,
            'avgPrive'=> $avgPrive,
            'countItem'=> $countItem,
            'sumPrice'=> $sumPrice,
        ]);
    }


    public function massUpdate()
    {
        Item::where('price',100)
            ->update(['title'=>'Product 1']);

        Item::where('price','>',200)->delete();

        return "done";

    }
}
