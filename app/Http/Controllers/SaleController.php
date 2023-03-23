<?php

namespace App\Http\Controllers;

use App\Models\Sale;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {

        $search = request('search');

        if ($search) {
            $sales = Sale::where([
                ['name', 'like', '%' . $search . '%']
            ])->get();
        } else {

            $sales = Sale::all();
        }

        $user = auth()->user();

        return view('sales.index', ['sales' => $sales]);
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {

        $sale = new Sale;

        $sale->name = $request->name;
        $sale->itens = $request->itens;
        $sale->price = $request->price;
        $sale->payment = $request->payment;
        $sale->parcel = $request->parcel;
        $sale->date = $request->date;
        $sale->price_parcel = $request->price_parcel;
        $sale->details = $request->details;

        $user = auth()->user();
        $sale->id = $sale->id;

        $sale->save();

        return redirect('/index');
    }

    public function destroy($id)
    {
        Sale::findOrFail($id)->delete();

        return redirect('/index');
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);

        return view('sales.edit', ['sale' => $sale]);
    }

    public function update(Request $request)
    {

        $data = $request->all();
        Sale::findOrFail($request->id)->update($data);

        return redirect('/index');
    }
}
