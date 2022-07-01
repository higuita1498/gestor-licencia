<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
    public function index($skip = 0, $take = 100)
    {
        //

        if(request()->skip){
            $skip = request()->skip;
        }

        if(request()->take){
            $take = request()->take;
        }

        $licences = Licence::with('product', 'partner', 'user')->skip($skip)->take($take)->get();

        return response()->json(['success' => true,
                                 'message' => 'Data found',
                                 'data' => $licences->all(),
                                 'skip' => $skip,
                                 'take' => $take,
                                 'type' => 'array'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            $licence = null;
            DB::beginTransaction();

            $product = Product::find($request->product_id);
            $partner = Partner::find($request->partner_id);

            for ($i = 0; $i < $request->licencesNumber; $i++) {
                $licence = Licence::create([
                    'LicenseKey' => Str::uuid(),
                    'ProductID' => $product->IdProduct,
                    'product_id' => $product->id,
                    'PartnerID' => $partner->PartnerID,
                    'partner_id' => $partner->id,
                ]);
            }

            DB::commit();

            if(!$licence){
                abort(403, 'El numero de licencia no es valido');
            }

            $response = response()->json(['success' => true,
                                    'message' => 'Licencia registrada correctamente',
                                    'data' => $licence,
                                    'type' => 'object'
            ]);

        } catch (\Throwable $th) {
            $response = response()->json(['success' => false,
                                            'message' => 'La licencia no se pudo crear',
                                            'data' => null,
                                            'errors' => $th->getMessage(),
                                            'type' => 'object'
                                        ]);
        }
     
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Licence  $licence
     * @return \Illuminate\Http\Response
     */
    public function show(Licence $licence)
    {
        //
        if($licence){
            $licence->load('product', 'partner', 'user');

            return response(['success' => true,
                             'message' => 'Licencia encontrada',
                             'data' => $licence,
                             'type' => 'object'
                            ]);
        }else{
            return response(['success' => false,
                             'message' => 'No se encontro la licencia',
                             'data' => null,
                             'type' => 'object'
            ]);
        }

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
