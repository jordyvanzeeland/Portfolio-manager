<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class ProjectsController extends BaseController
{

    public function get(){
        return DB::table('projects')->get();
    }

    public function category($catid){
        return DB::table('projects')->where('cat_id', $catid)->get();
    }

    public function details($id){
        return DB::table('projects')->where('project_id', $id)->get()[0];
    }

    public function create(Request $request){
        return response()->json(DB::table('projects')->insert([
            'cat_id' => $request->header('catid'),
            'project_name' => $request->header('projectname'),
            'project_type' => $request->header('projecttype')
        ]), 201);
    }

    public function update(Request $request, $id){
        return response()->json(DB::table('projects')->where('project_id', $id)->update([
            'cat_id' => $request->header('catid'),
            'project_name' => $request->header('projectname'),
            'project_type' => $request->header('projecttype')
        ]), 200);
    }

    public function delete($id){
        return DB::table('projects')->where('project_id', $id)->delete();
    }
}