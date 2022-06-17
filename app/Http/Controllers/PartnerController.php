<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use App\Models\PartnerType;
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
        $partners = Partner::with('partnerType')->latest()->paginate(10);

        $partnerTypes = PartnerType::all();

        return view('partners.index', compact('partners', 'partnerTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partnerTypes = PartnerType::all();

        return view('partners.create', compact('partnerTypes'));
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
            $partner->partner_type_id = $request->partner_type_id;
            $partner->save();
            DB::commit();

            return redirect()->route('partners.index');
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
        $partnerTypes = PartnerType::all();
        return view('partners.edit', compact('partner', 'partnerTypes'));
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
            $partner->partner_type_id = $request->partner_type_id;
            $partner->save();

            DB::commit();

            return redirect()->route('partners.index');
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
