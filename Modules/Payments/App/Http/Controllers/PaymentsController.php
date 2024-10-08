<?php

namespace Modules\Payments\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Payments\App\Models\PaymentMethodModel;
use Modules\Payments\App\PaymentMethods;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethodModel::all();
        return view('payments::index', [
            'paymentMethods' => $paymentMethods,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentMethods = new PaymentMethods();
        return view('payments::create', [
            'paymentMethods' => $paymentMethods->getPaymentMethods(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $id = PaymentMethodModel::create($data)->id;
        return PaymentMethods::registerMethod($data["method"], $id);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('payments::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $method = PaymentMethodModel::find($id);
        return view('payments::edit', [
            'method'=>$method,
            'editPaymentMethodView' => PaymentMethods::getEditView($method["method"]),
            'paymentMedtodData' => PaymentMethods::getPaymentDataMethod($method["method"],$id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $data = $request->all();
        $method = PaymentMethodModel::find($id);
        $method->update($data);
        if(isset($data['paymentMedtodData'])) {
            PaymentMethods::setPaymentDataMethod($method["method"],$id, $data['paymentMedtodData']);
        }
        return redirect()->route('payments.index')->with('messge', 'Payment method updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $method = PaymentMethodModel::find($id);
        if($method==null) {
            return redirect()->route('payments.index')->with('error', 'Payment method cannnot be deleted.');
        }
        $method->delete();
        return redirect()->route('payments.index')->with('messge', 'Payment method deleted successfully.');
    }
}
