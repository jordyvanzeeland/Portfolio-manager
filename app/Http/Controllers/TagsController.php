<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class TagsController extends BaseController
{

    public function get(){
        return DB::table('tags')->get();
    }

    public function category($catid){
        return DB::table('tags')->where('cat_id', $catid)->get();
    }

    public function details($id){
        return DB::table('tags')->where('tag_id', $id)->get()[0];
    }

    public function create(Request $request){
        return response()->json(DB::table('tags')->insert([
            'project_id' => $request->header('projectid'),
            'tag_name' => $request->header('typename')
        ]), 201);
    }

    public function update(Request $request, $id){
        return response()->json(DB::table('tags')->where('tag_id', $id)->update([
            'cat_id' => $request->header('catid'),
            'tag_name' => $request->header('tagname')
        ]), 200);
    }

    public function delete($id){
        return DB::table('tags')->where('tag_id', $id)->delete();
    }
}