<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Stocks;

class StocksController extends Controller
{
    public function __construct(Stocks $stocks)
    {
        $this->middleware('jwt', ['except' => ['getStock']]);
        $this->stocks = $stocks;
    }

    public function getStock()
    {
        try {
            $data = DB::table('stocks')
                    ->join('type', 'type.id', '=', 'stocks.type_id')
                    ->join('brand', 'brand.id', '=', 'stocks.brand_id')
                    ->select('type.type', 'brand.brand', 'stocks.itemName', 'stocks.quantity', 'stocks.sellPrice', 'stocks.picture')
                    ->orderBy('stocks.itemName', 'asc')
                    ->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'no data is found'], 404);
    }
    
    public function getItem($item)
    {
        try {
            $data = DB::table('stocks')
                    ->join('type', 'type.id', '=', 'stocks.type_id')
                    ->join('brand', 'brand.id', '=', 'stocks.brand_id')
                    ->select('type.type', 'brand.brand', 'stocks.itemName', 'stocks.quantity', 'stocks.basePrice', 'stocks.sellPrice',
                             'stocks.picture', 'size', 'stocks.itemLocation', 'stocks.description', 'stocks.purchaseLocation',
                             'stocks.type_id', 'stocks.brand_id')
                    ->where('stocks.itemName', $item)
                    ->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'no data is found'], 404);
    }

    public function getStockType($type)
    {
        try {
            $type = Type::select('id')->where('type', $type)->pluck('id');
            $data = DB::table('stocks')
                    ->join('type', 'type.id', '=', 'stocks.type_id')
                    ->join('brand', 'brand.id', '=', 'stocks.brand_id')
                    ->select('type.type', 'brand.brand', 'stocks.itemName', 'stocks.quantity', 'stocks.sellPrice')
                    ->where('type.id', '=', $type)
                    ->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }

    public function getStockBrand($brand)
    {
        try {
            $brand = Brand::select('id')->where('brand', $brand)->pluck('id');
            $data = DB::table('stocks')
                    ->join('type', 'type.id', '=', 'stocks.type_id')
                    ->join('brand', 'brand.id', '=', 'stocks.brand_id')
                    ->select('type.type', 'brand.brand', 'stocks.itemName', 'stocks.quantity', 'stocks.sellPrice')
                    ->where('brand.id', '=', $brand)
                    ->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }
    
    public function getRestock()
    {
        try {
            $data = Stocks::select('itemName', 'quantity')->whereRaw('quantity <= quantityMinimum')->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }
    
    public function getNewStock()
    {
        try {
            $data = Stocks::select('itemName', 'picture')->orderBy('created_at', 'desc')->take(8)->get();
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }

    public function addStock(Request $request)
    {
        $stocks = new Stocks();
        $payload = auth()->payload();
        $pt = $payload->get('sub');

        //Validation
        $request->validate([
            'type_id'=> 'required',
            'brand_id'=> 'required',
            'itemName'=> 'required',
            'sellPrice'=> 'required',
            'quantity'=> 'required',
        ]);

        //Input
        $stocks->user_id = $pt;
        $stocks->type_id = $request->input('type_id');
        $stocks->brand_id = $request->input('brand_id');
        $stocks->itemName = $request->input('itemName');
        $stocks->picture = $request->input('picture');
        $stocks->basePrice = $request->input('basePrice');
        $stocks->sellPrice = $request->input('sellPrice');
        $stocks->quantity = $request->input('quantity');
        $stocks->size = $request->input('size');
        $stocks->quantityMinimum = $request->input('quantityMinimum');
        $stocks->description = $request->input('description');
        $stocks->purchaseLocation = $request->input('purchaseLocation');
        $stocks->itemLocation = $request->input('itemLocation');

        if ($stocks->basePrice == null) {
            $stocks->basePrice = '0';
        };

        if ($stocks->quantityMinimum == null) {
            $stocks->quantityMinimum = '0';
        };

        try
        {
            $stocks->save();
            return ($stocks);
        } catch(QueryException $a) {
            return response()->json(["Error" => $a], 404);
        }
    }

    public function updateStock($item, Request $request)
    {   
        $payload = auth()->payload();
        $pt = $payload->get('sub');

        $new = [
            'user_id'=> $pt,
            'type_id'=> $request->type_id,
            'brand_id'=> $request->brand_id,
            'itemName'=> $request->itemName,
            'picture'=> $request->picture,
            'basePrice'=> $request->basePrice,
            'sellPrice'=> $request->sellPrice,
            'quantity'=> $request->quantity,
            'quantityMinimum'=> $request->quantityMinimum,
            'size'=> $request->size,
            'description'=> $request->description,
            'purchaseLocation'=> $request->purchaseLocation,
            'itemLocation'=> $request->itemLocation,
        ];

        if (! $request->has("type_id") {
            $new = $request->except(["type_id"])
        });
        if (! $request->has("brand_id") {
            $new = $request->except(["brand_id"])
        });
        if (! $request->has("itemName") {
            $new = $request->except(["itemName"])
        });
        if (! $request->has("picture") {
            $new = $request->except(["picture"])
        });
        if (! $request->has("basePrice") {
            $new = $request->except(["basePrice"])
        });        
        if (! $request->has("sellPrice") {
            $new = $request->except(["sellPrice"])
        });
        if (! $request->has("quantity") {
            $new = $request->except(["quantity"])
        });
        if (! $request->has("quantityMinimum") {
            $new = $request->except(["quantityMinimum"])
        });        
        if (! $request->has("size") {
            $new = $request->except(["size"])
        });
        if (! $request->has("description") {
            $new = $request->except(["description"])
        });
        if (! $request->has("itemLocation") {
            $new = $request->except(["itemLocation"])
        });
        if (! $request->has("purchaseLocation") {
            $new = $request->except(["purchaseLocation"])
        });
        if (! $request->has("blank") {
            $new = $request->except(["blank"])
        });

        try{
            $data = Stocks::where('itemName', $item)->update($new);
            return response()->json(["updated"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }

    /*
    //Update Last User
    public function updateStockLastUser($id, Request $request)
    {  
        $payload = auth()->payload();
        $pt = $payload->get('sub');

        $new = [
            "user_id"=> $pt,
        ];

        try{
            Stocks::where('id',$id)->update($new);
            return response()->json(["updated"],200);
        }
        catch(QueryException $a){
            return response()->json(["Error" => "not found"], 404);
        }
    }
    */

    public function deleteStock($id)
    {
        try{
            $data = Stocks::where("id",$id)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }
}