<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;

class ProjectAssetsController extends BaseController
{

    public function get(){
        return DB::table('projectassets')->get();
    }

    public function project($projectid){
        return DB::table('projectassets')->where('project_id', $projectid)->get();
    }

    public function details($id){
        return DB::table('projectassets')->where('asset_id', $id)->get()[0];
    }

    public function create(Request $request){
        return response()->json(DB::table('projectassets')->insert([
            'asset_type' => $request->header('assettype'),
            'asset_content' => $request->header('assetcontent'),
            'project_id' => $request->header('projectid')
        ]), 201);
    }

    public function update(Request $request, $id){
        return response()->json(DB::table('projectassets')->where('asset_id', $id)->update([
            'asset_type' => $request->header('assettype'),
            'asset_content' => $request->header('assetcontent'),
            'project_id' => $request->header('projectid')
        ]), 200);
    }

    public function delete($id){
        return DB::table('projectassets')->where('asset_id', $id)->delete();
    }
}