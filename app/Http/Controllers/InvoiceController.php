<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
// use App\Models\Type;
// use App\Models\Brand;

class InvoiceController extends Controller
{
    public function __construct(Invoice $invoice)
    {
        $this->middleware('jwt', ['except' => ['']]);
        $this->invoice = $invoice;
    }

    public function getInvoice()
    {
        try {
            $data = Invoice::orderBy('updated_at', 'desc')->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => 'not found'], 404);
        }
    }
    
    public function getInvoiceNo($salesNo)
    {
        try {
            $data = Invoice::where('salesNo', $salesNo)->orderBy('invoice.itemName', 'asc')->get();
            /*
            $data = DB::table('invoice')
                    ->join('type', 'type.id', '=', 'invoice.type_id')
                    ->join('brand', 'brand.id', '=', 'invoice.brand_id')
                    ->select('type.type', 'brand.brand', 'invoice.salesNo', 'invoice.itemName', 'invoice.quantity', 'invoice.price')
                    ->where('invoice.salesNo', $salesNo)
                    ->orderBy('invoice.itemName', 'asc')
                    ->get();
            */
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => 'not found'], 404);
        }
    }

    public function getInvoicePrice($salesNo)
    {
        try {
            $data = Invoice::where('salesNo', $salesNo)->get();
            return $data->sum('price');
        } catch (QueryException $e) {
            return response()->json(['error' => 'not found'], 404);
        }
    }
    
    public function getMostPopular()
    {
        try {
            $data = Invoice::select('itemName', DB::raw('COUNT(itemName) as count'))
                    ->groupBy('itemName')
                    ->orderBy('count', 'desc')
                    ->take(9)
                    ->get();
            return response()->json($data);
        } catch (QueryException $e) {
            return response()->json(['error' => 'not found'], 404);
        }
    }

    public function addInvoice(Request $request)
    {
        $request->validate([
            // 'type_id'=> 'required',
            // 'brand_id'=> 'required',
            'salesNo'=> 'required',
            'itemName'=> 'required',
            'quantity'=> 'required',
            'price'=> 'required',
        ]);

        $new =
        [
            // 'type_id'=> $request->type_id,
            // 'brand_id'=> $request->brand_id,
            'salesNo'=> $request->salesNo,
            'itemName'=> $request->itemName,
            'quantity'=> $request->quantity,
            'price'=> $request->price,
        ];
        
        try
        {
            $data = $this->invoice->create($new);
            $array = Array();
            $array['data'] = $data;
            return response()->json($array);
        } catch(QueryException $a) {
            return response()->json(["Error" => $a], 404);
        }
    }

    public function updateInvoice($id, Request $request)
    {
        $new =
        [
            // 'type_id'=> $request->type_id,
            // 'brand_id'=> $request->brand_id,
            'salesNo'=> $request->salesNo,
            'itemName'=> $request->itemName,
            'quantity'=> $request->quantity,
            'price'=> $request->price,
        ];
        
        // if (! $request->has("type_id") {
            // $new = $request->except(["type_id"])
        // });
        // if (! $request->has("brand_id") {
            // $new = $request->except(["brand_id"])
        // });
        if (! $request->has("salesNo") {
            $new = $request->except(["salesNo"])
        });
        if (! $request->has("itemName") {
            $new = $request->except(["itemName"])
        });
        if (! $request->has("quantity") {
            $new = $request->except(["quantity"])
        });
        if (! $request->has("price") {
            $new = $request->except(["price"])
        });
        if (! $request->has("blank") {
            $new = $request->except(["blank"])
        });

        try{
            Invoice::where('id',$id)->update($new);
            return response()->json(["updated"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }

    public function deleteInvoice($id)
    {
        try{
            $data = Invoice::where("id",$id)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }

    public function deleteInvoiceNo($salesNo)
    {
        try{
            $data = Invoice::where("salesNo",$salesNo)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }
}
