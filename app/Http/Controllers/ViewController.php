<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    function page1()
    {
        return view('page1');
    }

    function index(){
        $title = "List Items";
        $numberOfItems = Item::count();
        // SELECT * FROM ITEMS
        $items = Item::all();
        $average = Item::avg("price");

        $this->prepareData();
        return view('item.index')
            ->with('page_title',$title)
            ->with('number_items',$numberOfItems)
            ->with('data',$items)
            ->with('average',$average);

//        return view('item.index',
//            [
//                'page_title' => $title,
//                'number_items' => $numberOfItems,
//                'data'=>$items
//            ]
//        );
    }

    function view($id){
        $item = Item::findOrFail($id);
        $title = "Item Details";
        $this->prepareData();
        return view('item.view',compact('item','title'));
    }

    function prepareData(){
        $maxId = Item::max('id');
        $minId= Item::min('id');
        $copyrights = "Copyright &copy; 2026";
        \View::share(['copyrights'=>$copyrights,'maxId'=>$maxId,'minId'=>$minId]);
    }
}
