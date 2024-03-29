<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_Type;
use Illuminate\Http\Request;
use Hash;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Product::all();
        return view('barangs.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_type = Product_Type::all();
        return view('barangs.create', compact('product_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'qty' => 'required',
            'selling_price' => 'required',
            'buying_price' => 'required',
            'product_type' => 'required',
        ]);

        $data = $request->all();
        // dd($data);
        $check = Product::create([
            'product_name' => $data['product_name'],
            'qty' => $data['qty'],
            'selling_price' => $data['selling_price'],
            'buying_price' => $data['buying_price'],
            'product_type_id' => $data['product_type']
        ]);

        return redirect()->route('barangs.index')->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Product::find($id);
        $product_types = Product_Type::all();
        return view('barangs.edit', compact('product_types', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'qty' => 'required',
            'selling_price' => 'required',
            'buying_price' => 'required',
            'product_type' => 'required',

        ]);

        $product->product_name = $request->product_name;
        $product->qty = $request->qty;
        $product->selling_price = $request->selling_price;
        $product->buying_price = $request->buying_price;
        $product->product_type_id = $request->product_type;
        $product->save();

        return redirect()->route('barangs.index')->withSucces('Great! You have succesfully updated' . $product->product_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('barangs.index')->withSucces('Great! You have succesfully DELETED' . $product->product_name);
    }
}
