<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
  public function __construct(Brand $brand)
  {
      $this->middleware('jwt', ['except' => ['getBrand']]);
      $this->brand = $brand;
  }

  public function getBrand()
  {
      try {
          $data = Brand::get();
          return $data;
      } catch (QueryException $e) {
          return response()->json(['error' => "failed"], 404);
      }

      if(count($data) > 0){
          return response()->json($data);
      }return response()->json(['error' => 'not found'], 404);
  }
  
  public function addBrand(Request $request)
  {
      $request->validate([
          'brand'=> 'required',
      ]);

      $new =
      [
          'brand'=> $request->brand,
      ];

      try
      {
          $data = $this->brand->create($new);
          $array = Array();
          $array['data'] = $data;
          return response()->json($array);
      } catch(QueryException $a) {
          return response()->json(["Error" => $a], 404);
      }
  }

  public function updateBrand($id, Request $request)
  {
      $request->validate([
          'brand'=> 'required',
      ]);

      $new = [
          "brand" => $request->brand,
      ];
      
      try{
          Brand::where('id',$id)->update($new);
          return response()->json(["updated"], 200);
      } catch(QueryException $a) {
          return response()->json(["Error" => "not found"], 404);
      }
  }

  public function deleteBrand($id)
  {
      try{
          $data = Brand::where("id",$id)->delete(); 
          return response()->json(["deleted"], 200);
      } catch(QueryException $a) {
          return response()->json(["Error" => "not found"], 404);
      }
  }
}
