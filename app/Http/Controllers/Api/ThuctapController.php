<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thuctap;
use App\Http\Requests\ThuctapRequest;
class ThuctapController extends Controller
{
    public function listThuctap(){
        $listThuctap = Thuctap::all();
       return response()->json([
            'listThuctap' => $listThuctap,
            'message' => 'success'
       ], 200);
    } 
    public function addPostThuctap(ThuctapRequest $req){
       
        $data = [
            'name' => $req->name,
            'avatar' => null,
            'birthday' => $req->birthday,
            'biography' => $req->biography,
        ];
      $newlistThuctap =  Thuctap::create($data);
        return response()->json([
            'newlistThuctap' => $newlistThuctap,
            'message' => 'success'
        ], 201);
    }
    public function updatePutThuctap($id, ThuctapRequest $req){
        $thuctap = Thuctap::find($id);
        $data = [
            'name' => $req->name,
            'avatar' => null,
            'birthday' => $req->birthday,
            'biography' => $req->biography,
        ];
        $thuctap->update($data);
        return response()->json([
            'thuctap' => $thuctap,
            'message' => 'success'
        ], 201);
    }
    public function deleteThuctap($id){
        $thuctap = Thuctap::find($id);
        $thuctap->delete();
        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
