<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Helpers\PricesHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use Modules\Payments\App\Models\PaymentMethodModel;
use Modules\Payments\App\PaymentMethods;
use Modules\Payments\App\Payments\Payment;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoice.index', [
            'invoices' => Invoice::orderBy('created_at', 'DESC')->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoice.create', [
            'buyers' => Buyer::all(),
            'paymentMethods' => PaymentMethodModel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        $data = $request->validated();

        //check if there is a new buyer or exited one
        if($request['buyer_id']==-1) {
            //create new buyer
            $buyer = Buyer::create($data);
            $data['buyer_id'] = $buyer->id;
        }
        $data['user_id'] = auth()->user()->id;
        //create invoice
        $invoice = Invoice::create($data)->with('paymentMethod');
        //init totals
        $invoice['total_net'] = 0;
        $invoice['total_discount'] = 0;
        $invoice['total_gross'] = 0;
        $invoice['total_tax'] = 0;
        //add items to invoice
        foreach($data['item'] as $item) {
            $itm = [];
            $itm['invoice_id'] = $invoice->id;
            $itm['price_net']  = $item['price_net'];
            //calculate discount by amount or %
            if(str_contains($item['discount'], '%')) {
                $itm['discount_type'] = 'percentage';
                $itm['discount'] = str_replace('%', '', $item['discount']);
                if($itm['discount'] > 0) {
                    $itm['discount'] = ($itm['discount'] / 100) * $itm['price_net'];
                } else {
                    $itm['discount'] = 0;
                }
            } else {
                $itm['discount_type'] = 'amount';
                $itm['discount'] = $item['discount'];
            }
            $itm['quantity'] = $item['quantity'];
            $itm['tax_rate'] = $item['tax_rate'];
            $priceNettAfterDiscount = $item['price_net'] - $item['discount'];
            $itm['total_net'] = round($item['quantity'] * $priceNettAfterDiscount,2);
            $itm['total_discount'] = round($item['quantity'] * $item['discount'],2);
            $itm['price_gross'] = PricesHelper::calculatePriceWithVat($item['tax_rate'], $priceNettAfterDiscount);
            $itm['total_gross'] = round($itm['price_gross'] * $item['quantity'],2);
            $itm['tax_amount'] = PricesHelper::calculateVatNet($item['tax_rate'], $priceNettAfterDiscount);
            $itm['total_tax'] = PricesHelper::calculateVatNet($item['tax_rate'], $itm['total_gross']);
            $invoice->items()->create($itm);
            //update totals
            $invoice['total_net'] += $itm['total_net'];
            $invoice['total_discount'] += $itm['total_discount'];
            $invoice['total_gross'] += $itm['total_gross'];
            $invoice['total_tax'] += $itm['total_tax'];
        }

        //generate invoice
        // $pdf = Pdf::loadView('pdf', ['data' => $invoice]);
        //store

        //get path

        //update totals
        $invoice->save();

        return redirect()->route('invoice.index')->with('message', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $invoice = Invoice::with('paymentMethod')->findOrFail($id);
        $items = $invoice->items;
        $template = 'default';
        $paymentMethod = PaymentMethods::getPaymentMethodTemplate($invoice->paymentMethod->method, $invoice->paymentMethod->id);
        return view('invoice.template.'.$template.'.pdf', [
            'invoice'       => $invoice,
            'items'         => $items,
            'showQty'       => $items->sum('quantity') !== count($items),
            'showDiscount'  => $items->sum('total_discount') > 0,
            'paymentMethod' => $paymentMethod,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function update(UpdateInvoiceRequest $request,$id)
    {
        $data = $request->validated();

        $invoice = Invoice::find($id);
        if($invoice==null) {
            return redirect()->route('invoice.index')->with('error', 'Invoice cannnot be updated.');
        }
        $invoice->update([
            'status' => $data['status'],
            'payment_status' => $data['payment_status'],
        ]);
        return redirect()->route('invoice.index')->with('messge', 'Invoice has been updated successfully.');
    }
}
