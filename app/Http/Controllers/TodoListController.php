<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoListController extends Controller
{
    //index 

    public function index(){
        $result= DB::table('activity')->get();
        $list = $result ->toArray();
        
        return view('index' ,['list'=>$list]);
    }

    public function create(){
       // $result=DB::table('')->create();
       //dd(request()->title);
       $query = DB::table('activity')->insert([
        'title'=> request()->title,
        'description'=> request()->description,
        'status' => request()->status,
       ]);
       if($query){
           return back()->with('success','activities added succesfully');
       }else{
        return back()->with('error','something went wrong');
       }
    }
    public function delete($id){
        //dd($id);
        $deleted = DB::table('activity')->where('id', '=', $id)->delete();
        if($deleted){
            return back()->with('success','activities deleted succesfully');
        }else{
         return back()->with('error','something went wrong');
        }
    }
    public function updatePage($id){
        $selectid = DB::table('activity')->where('id','=', $id)->get();
        $selectid = $selectid ->toArray();

        

        return view('update' ,['list'=>$selectid]);
    }
    public function update(){ 
        $updatequery = DB::table('activity')->where('id','=',request()->id)->update([
            'title'=> request()->title,
            'description'=> request()->description,
            'status'=> request()->status,
        ]);
        if($updatequery){
            return redirect('index')->with('success','activities updated succesfully');
        }else{
         return back()->with('error','something went wrong');
        }
    }

    public function updateCheckbox(Request $request){
        $request->validate([
            "value"=> "required|string",
        ]);
        $updatequery = DB::table('activity')->where('id','=',request()->id)->update([
            'status'=> request()->value,
        ]);
        return response()->json(["message"=> ["value"=> $request->value]],200);
    }
}
