<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class EvalueController extends Controller
{
    public function evalue (Request $request,$code){
      
        $results = DB::table('detail_evalue')
            ->select('*')
            ->where('code', $code)
            ->get();
        $all = DB::table('detail_evalue')
        ->select('*')
        ->where('id_user', $results[0]->id_user)

        ->get();
        $teacher = DB::table('register_teachers')
        ->select('*')
        ->where('id', $results[0]->id_user)
        ->first();

        $user = User::where('id',$results[0]->id_user)->orderByDesc('created_at')->get();
        $comment = DB::table('detail_evalue')
        ->select('*')
        ->where('id_user', $results[0]->id_user)
        ->where('Point','!=', null)
        ->get();
        
            if ($results[0]->is_evalue == null) {
               return view('evalue',compact('code'));
            } else {
               return view('tutor_detail',compact('user','comment'));
            }
    }
    public function evalue1 (Request $request){
        $evalue = DB::table('detail_evalue')
        ->where('code', $request->code)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('Point' => $request->point,'is_evalue' => 1,'comment'=>$request->comment));
        $results = DB::table('detail_evalue')
            ->select('*')
            ->where('code', $request->code)
            
            ->get();
            $teacher = DB::table('register_teachers')
        ->select('*')
        ->where('id', $results[0]->id_user)
        ->first();
        $all = DB::table('detail_evalue')
        ->select('*')
        ->where('id_user', $results[0]->id_user)
        ->where('Point','!=', null)
        ->get();

        $user = User::where('id',$results[0]->id_user)->orderByDesc('created_at')->get();
        $comment = DB::table('detail_evalue')
        ->select('*')
        ->where('id_user', $results[0]->id_user)
        ->where('Point','!=', null)
        ->get();
    
        return view('tutor_detail',compact('user','comment'));
    }
    public function tutordetail ($id){
        $data = array();
        $user = User::where('id',$id)->orderByDesc('created_at')->get();
        $comment = DB::table('detail_evalue')
        ->select('*')
        ->where('id_user', $id)
        ->where('Point','!=', null)
        ->get();
        return view('tutor_detail',compact('user','comment'));
    }
}
