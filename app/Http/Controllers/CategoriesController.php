<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class CategoriesController extends BaseController
{

    public function get(){
        return DB::table('categories')->get();
    }

    public function details($id){
        return DB::table('categories')->where('cat_id', $id)->get()[0];
    }

    public function create(Request $request){
        return response()->json(DB::table('categories')->insert([
            'cat_name' => $request->header('catname')
        ]), 201);
    }

    public function update(Request $request, $id){
        return response()->json(DB::table('categories')->where('cat_id', $id)->update([
            'cat_name' => $request->header('catname')
        ]), 200);
    }

    public function delete($id){
        return DB::table('categories')->where('cat_id', $id)->delete();
    }
}