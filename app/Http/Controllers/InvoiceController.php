<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoice.index', [
            'invoices' => Invoice::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoice.create', [
            'buyers' => Buyer::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        $data = $request->validated();
        dd($data);
        //check if there is a new buyer or exited one
        if($request->buyer_id==-1) {
            $buyer = Buyer::create($data['new_buyer']);
            $data['buyer_id'] = $buyer->id;
        } else {
            $data['buyer_id'] = $data['buyer'];
        }
        unset($data['new_buyer']);
        $data->buyer_id = $data['buyer'];
        unset($data['buyer']);
        //create invoice
        $invoice = Invoice::create($data);
        //add items to invoice
        if($request->has('items')) {
            foreach($data['items'] as $item) {
                $item->invoice_id = $invoice->id;
                $invoice->items()->create($item);
            }
        }
        return redirect()->route('invoice.index')->with('message', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        if($invoice==null) {
            return redirect()->route('invoice.index')->with('error', 'Invoice cannnot be deleted.');
        }
        $invoice->delete();
        return redirect()->route('invoice.index')->with('messge', 'Invoice deleted successfully.');
    }
}
