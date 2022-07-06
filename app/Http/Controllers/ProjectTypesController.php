<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class ProjectTypesController extends BaseController
{

    public function get(){
        return DB::table('projecttypes')->get();
    }

    public function project($projectid){
        return DB::table('projecttypes')->where('project_id', $projectid)->get();
    }

    public function details($id){
        return DB::table('projecttypes')->where('type_id', $id)->get()[0];
    }

    public function create(Request $request){
        return response()->json(DB::table('projecttypes')->insert([
            'type_name' => $request->header('typename')
        ]), 201);
    }

    public function update(Request $request, $id){
        return response()->json(DB::table('projecttypes')->where('type_id', $id)->update([
            'type_name' => $request->header('typename')
        ]), 200);
    }

    public function delete($id){
        return DB::table('projecttypes')->where('type_id', $id)->delete();
    }
}