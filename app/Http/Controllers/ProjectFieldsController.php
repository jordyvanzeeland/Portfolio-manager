<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class ProjectFieldsController extends BaseController
{

    public function get(){
        return DB::table('projectfields')->get();
    }

    public function project($projectid){
        return DB::table('projectfields')->where('project_id', $projectid)->get();
    }

    public function details($id){
        return DB::table('projectfields')->where('field_id', $id)->get()[0];
    }

    public function create(Request $request){
        return response()->json(DB::table('projectfields')->insert([
            'field_name' => $request->header('fieldname'),
            'field_type' => $request->header('fieldtype'),
            'project_id' => $request->header('projectid')
        ]), 201);
    }

    public function update(Request $request, $id){
        return response()->json(DB::table('projectfields')->where('field_id', $id)->update([
            'field_name' => $request->header('fieldname'),
            'field_type' => $request->header('fieldtype'),
            'project_id' => $request->header('projectid')
        ]), 200);
    }

    public function delete($id){
        return DB::table('projectfields')->where('field_id', $id)->delete();
    }
}