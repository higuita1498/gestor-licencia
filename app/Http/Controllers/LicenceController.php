<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licence;
use App\Models\Partner;
use App\Models\Product;
use App\Http\Requests\StoreLicenceRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LicenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licences = Licence::with('product', 'partner', 'user')->latest()->paginate();

        return view('licences.index', compact('licences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Partner::all();
        $products = Product::all();

        return view('licences.create', compact('partners', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLicenceRequest $request)
    {

        try {

            DB::beginTransaction();

            $product = Product::find($request->product_id);
            $partner = Partner::find($request->partner_id);

            for ($i = 0; $i < $request->licencesNumber; $i++) {
                Licence::create([
                    'LicenseKey' => Str::uuid(),
                    'ProductID' => $product->IdProduct,
                    'product_id' => $product->id,
                    'PartnerID' => $partner->PartnerID,
                    'partner_id' => $partner->id,
                ]);
            }

            DB::commit();

            return redirect()
                ->route('licences.index')
                ->withStatus(__('Licences successfully created.'));

        } catch (\Throwable $th) {

            DB::rollback();
            return back()->withErrors($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Licence  $licence
     * @return \Illuminate\Http\Response
     */
    public function show(Licence $licence)
    {
        $licence->load('product', 'partner', 'user');
        return view('licences.show', compact('licence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Licence  $licence
     * @return \Illuminate\Http\Response
     */
    public function edit(Licence $licence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Licence  $licence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Licence $licence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Licence  $licence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Licence $licence)
    {
        //
    }
}
