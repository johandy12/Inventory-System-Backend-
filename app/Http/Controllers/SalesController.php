<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales;
use DB;

class SalesController extends Controller
{
    public function __construct(Sales $sales)
    {
        $this->middleware('jwt', ['except' => ['']]);
        $this->sales = $sales;
    }

    public function getSales()
    {
        try {
            $data = DB::table('sales')
                    ->join('users', 'users.id', '=', 'sales.seller_id')
                    ->select('users.name', 'sales.salesNo', 'sales.paymentType', 'sales.totalPrice', 'sales.tax',
                             'sales.shipment', 'sales.status', 'sales.transactionDate', 'sales.description', 
                             'sales.customerName')
                    ->orderBy('sales.transactionDate', 'desc')
                    ->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }

    public function getSalesNo($salesNo)
    {
        try {
            $data = DB::table('sales')
                    ->join('users', 'users.id', '=', 'sales.seller_id')
                    ->select('users.name', 'sales.salesNo', 'sales.paymentType', 'sales.totalPrice', 'sales.tax',
                             'sales.shipment', 'sales.status', 'sales.transactionDate', 'sales.description', 
                             'sales.customerName')
                    ->where('sales.salesNo', $salesNo)
                    ->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }


    public function getNewSalesNo()
    {
        try {
            $data = Sales::select('salesNo')->orderBy('created_at', 'desc')->first();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }

    public function getMonthlySalesTotal($month)
    {
        try {
            //$data = Stocks::select(DB::raw('YEAR(created_at) year, MONTH(created_at) month'))->groupby('year', 'month');
            $data = Sales::whereMonth('transactionDate', '=', $month)->get()->sum('totalPrice');
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }
    
    public function getYearlySales($year)
    {
        try {
            $data = [];
            for($month = 1; $month <= 12; $month++) {
                $data[$month-1] = Sales::whereYear('transactionDate', '=', $year)->whereMonth('transactionDate', '=', $month)->get()->sum('totalPrice');
            }
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }

    public function addSales(Request $request)
    {
        $sales = new Sales();
        $payload = auth()->payload();
        $pt = $payload->get('sub');

        //Validation
        $request->validate([
            'salesNo'=> 'required',
            'customerName'=> 'required',
            'paymentType'=> 'required',
            'totalPrice'=> 'required',
            'transactionDate'=> 'required',
            'status'=> 'required',
        ]);

        //Input
        $sales->seller_id = $pt;
        $sales->salesNo = $request->input('salesNo');
        $sales->customerName = $request->input('customerName');
        $sales->paymentType = $request->input('paymentType');
        $sales->totalPrice = $request->input('totalPrice');
        $sales->tax = $request->input('tax');
        $sales->shipment = $request->input('shipment');
        $sales->description = $request->input('description');
        $sales->transactionDate = $request->input('transactionDate');
        $sales->status = $request->input('status');

        if ($sales->tax == null) {
            $sales->tax = '0';
        };
        if ($sales->shipment == null) {
            $sales->shipment = '0';
        };
        if ($sales->description == null) {
            $sales->description = '';
        };

        try
        {
            $sales->save();
            return ($sales);
        } catch(QueryException $a) {
            return response()->json(["Error" => $a], 404);
        }
    }

    public function updateSales($salesNo, Request $request)
    {
        $new =
        [
            // 'seller_id'=> $request->seller_id,
            // 'salesNo'=> $request->salesNo,
            'customerName'=> $request->customerName,
            'paymentType'=> $request->paymentType,
            'totalPrice'=> $request->totalPrice,
            'tax'=> $request->tax,
            'shipment'=> $request->shipment,
            'description'=> $request->description,
            'transactionDate'=> $request->transactionDate,
            'status'=> $request->status,
        ];

        // if (! $request->has("seller_id") {
        //     $new = $request->except(["seller_id"])
        // });
        // if (! $request->has("salesNo") {
        //     $new = $request->except(["salesNo"])
        // });
        if (! $request->has("customerName") {
            $new = $request->except(["customerName"])
        });
        if (! $request->has("paymentType") {
            $new = $request->except(["paymentType"])
        });
        if (! $request->has("totalPrice") {
            $new = $request->except(["totalPrice"])
        });
        if (! $request->has("tax") {
            $new = $request->except(["tax"])
        });
        if (! $request->has("shipment") {
            $new = $request->except(["shipment"])
        });
        if (! $request->has("description") {
            $new = $request->except(["description"])
        });
        if (! $request->has("transactionDate") {
            $new = $request->except(["transactionDate"])
        });
        if (! $request->has("status") {
            $new = $request->except(["status"])
        });
        if (! $request->has("blank") {
            $new = $request->except(["blank"])
        });

        try{
            Sales::where('salesNo',$salesNo)->update($new);
            return response()->json(["updated"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }

    public function deleteSales($id)
    {
        try{
            $data = Sales::where("id",$id)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }
}