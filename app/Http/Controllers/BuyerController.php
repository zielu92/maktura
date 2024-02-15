<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreBuyerRequest;
use App\Http\Requests\UpdateBuyerRequest;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('buyer.index', [
            'buyers' => Buyer::paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buyer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuyerRequest $request)
    {
        Buyer::create($request->validated());
        return redirect()->route('buyer.index')->with('messge', 'Buyer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('buyer.show', [
            'buyer' => Buyer::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('buyer.edit', [
            'buyer' => Buyer::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBuyerRequest $request, $id)
    {
        $buyer = Buyer::findOrFail($id);
        $buyer->update($request->validated());
        return redirect()->route('buyer.index')->with('messge', 'Buyer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buyer = Buyer::find($id);
        if($buyer==null) {
            return redirect()->route('buyer.index')->with('error', 'Buyer cannnot be deleted.');
        }
        $buyer->delete();
        return redirect()->route('buyer.index')->with('messge', 'Buyer deleted successfully.');
    }
}
