<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id','asc')->paginate(10);
        return view('invoice.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_mobile'] = $request->customer_mobile;
        $data['company_name'] = $request->company_name;
        $data['invoice_number']=$request->invoice_number;
        $data['invoice_date'] = $request->invoice_date;
        $data['sub_total'] = $request->sub_total;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['vat_value'] = $request->vat_value;
        $data['shipping'] = $request->shipping;
        $data['total_due'] = $request->total_due;
       
       $invoice =  Invoice::create($data);
       
        $detelis_list = [];

        for($i=0; $i < count($request->product_name); $i++){
            $details_list[$i]['product_name']=$request->product_name[$i];
            $details_list[$i]['unit'] = $request->unit[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }
    $details = $invoice->deteils()->createMany($details_list);
   
        if($details){
            return redirect()->back()->with([
                'message' => 'Created Successfully',
                'alert-type' => 'success',
            ]);
        }else{
            return redirect()->back()->with([
                'message' => 'Something went wrong',
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice) 
    {
        
        
        
        return view('invoice.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $invoice = Invoice::findOrFail($invoice->id);
        return view('invoice.edit',compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_mobile'] = $request->customer_mobile;
        $data['company_name'] = $request->company_name;
        $data['invoice_number'] = $request->invoice_number;
        $data['invoice_date'] = $request->invoice_date;
        $data['sub_total'] = $request->sub_total;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['vat_value'] = $request->vat_value;
        $data['shipping'] = $request->shipping;
        $data['total_due'] = $request->total_due;
        $invoice->update($data);

        $invoice->deteils()->delete();
        $detelis_list = [];

        for ($i = 0; $i < count($request->product_name); $i++) {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['unit'] = $request->unit[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }
        $details = $invoice->deteils()->createMany($details_list);
   
        return redirect()->route('invoice.index')->with([
            'message' => '  Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        Invoice::where('id',$invoice->id)->delete();
        return  redirect()->back()->with([
            'message' => 'Deleted Successfully',
            'alert-type' => 'warning',
        ]);
    }
    public function print(Invoice $invoice){

        
        $invoice=Invoice::findOrFail($invoice->id);
         return view('invoice.print',compact('invoice'));
        
    }
}