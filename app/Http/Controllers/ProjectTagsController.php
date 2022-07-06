<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class ProjectTagsController extends BaseController
{

    public function get(){
        return DB::table('projecttags')->get();
    }

    public function project($projectid){
        return DB::table('projecttags')->where('project_id', $projectid)->get();
    }

    public function details($id){
        return DB::table('projecttags')->where('tag_id', $id)->get()[0];
    }

    public function create(Request $request){
        return response()->json(DB::table('projecttags')->insert([
            'project_id' => $request->header('projectid'),
            'tag_name' => $request->header('typename')
        ]), 201);
    }

    public function update(Request $request, $id){
        return response()->json(DB::table('projecttags')->where('tag_id', $id)->update([
            'project_id' => $request->header('projectid'),
            'tag_name' => $request->header('tagname')
        ]), 200);
    }

    public function delete($id){
        return DB::table('projecttags')->where('tag_id', $id)->delete();
    }
}