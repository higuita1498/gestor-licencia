<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::latest()->paginate(10);

        return view('partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerRequest $request)
    {
        try {

            DB::beginTransaction();
            $partner = new Partner();
            $partner->PartnerName = $request->PartnerName;
            $partner->PartnerEmail = $request->PartnerEmail;
            $partner->PartnerContactName = $request->PartnerContactName;
            $partner->PartnerContactNumber = $request->PartnerContactNumber;
            $partner->save();
            DB::commit();

            return redirect()->route('partners.index')
                ->withStatus(__('Partner successfully created.'));
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            DB::rollback();
            return back()
                ->withInput()
                ->withErrors($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        try {
            DB::beginTransaction();
            $partner->PartnerName = $request->PartnerName;
            $partner->PartnerEmail = $request->PartnerEmail;
            $partner->PartnerContactName = $request->PartnerContactName;
            $partner->PartnerContactNumber = $request->PartnerContactNumber;
            $partner->save();

            DB::commit();

            return redirect()->route('partners.index')
                ->withStatus(__('Partner successfully updated.'));
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            DB::rollback();
            return back()->withErrors($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index');
    }
}
