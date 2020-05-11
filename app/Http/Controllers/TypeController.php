<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Type;

class TypeController extends Controller
{
    public function __construct(Type $type)
    {
        $this->middleware('jwt', ['except' => ['getType']]);
        $this->type = $type;
    }

    public function getType()
    {
        try {
            $data = Type::get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }

    public function addType(Request $request)
    {
        $request->validate([
            'type'=> 'required',
        ]);

        $new =
        [
            'type'=> $request->type,
        ];

        try
        {
            $data = $this->type->create($new);
            $array = Array();
            $array['data'] = $data;
            return response()->json($array);
        } catch(QueryException $a) {
            return response()->json(["Error" => $a], 404);
        }
    }

    public function updateType($id, Request $request)
    {
        $request->validate([
            'type'=> 'required',
        ]);

        $new = [
            "type" => $request->type,
        ];
        
        try{
            Type::where('id',$id)->update($new);
            return response()->json(["updated"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }

    public function deleteType($id)
    {
        try{
            $data = Type::where("id",$id)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }
}
