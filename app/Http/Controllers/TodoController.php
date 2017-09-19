<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index(){
       return response()->json([
                                 'response' =>  [
                                                'code' => 200,  
                                                'data' => Todo::all(),
                                              ] 
                                ]);
    }
    
    public function store(Request $request){
        $todo = Todo::create($request->all());
        return response()->json(
                               [
                                 'response' =>  [
                                                'code' => 200,  
                                                'data' => $todo? $todo : [],
                                              ] 
                                ]
                    );
    }
    
    public function update($todo, Request $request){
        $todo = Todo::find($todo);
        $is_updated = $todo? $todo->update($request->all()) : false; 
        return response()->json(
                                [
                                 'response' =>  [
                                                'code' => $is_updated? 200 : 404,  
                                                'data' => $todo? $todo : [],
                                              ] 
                                ]
                                );
    }
    
    public function destroy($todo){
        $todo = Todo::find($todo);
        $is_deleted = $todo? $todo->delete() : false; 
        return response()->json(
                                [
                                 'response' =>  [
                                                'code' => $is_deleted? 200 : 404,  
                                                'data' => $todo? $todo : [],
                                              ] 
                                ]
                                );
    }
}
