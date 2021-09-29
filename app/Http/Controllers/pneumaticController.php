<?php

namespace App\Http\Controllers;

use App\Models\PneumaticPart;
use Illuminate\Http\Request;
use App\Http\Requests\pneumaticPartStoreRequest;

class pneumaticController extends Controller
{
    /**
     * Return all the pneumatics data.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $pneumatics = pneumaticPart::when(request('search_key'), function ($query) {
            $query->where('part', 'like' , request('search_key').'%')
                ->orWhere('tube_size', request('search_key'));
        })->paginate(request('record_count', 5));

        return response()->json($pneumatics);
    }

    /**
     * Delete the pneumatic records
     * @param PneumaticPart $pneumaticPart
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(pneumaticPart $pneumaticPart){
        $pneumaticPart->delete();
        return response()->json(['status'=>'success']);
    }

    /**
     * Send record for the edit (don't use)
     * @param PneumaticPart $pneumaticPart
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(pneumaticPart $pneumaticPart){
        return response()->json($pneumaticPart);
    }

    /**
     * Add pneumatic part data to the database
     * @param pneumaticPartStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PneumaticPartStoreRequest $request){
        $pneumaticPart = new PneumaticPart;
        $pneumaticPart->category_id = 1;
        $pneumaticPart->part = $request->input('part');
        $pneumaticPart->description = $request->input('description');
        $pneumaticPart->tube_size = $request->input('tubesize');
        $pneumaticPart->warranty = $request->input('warranty');
        $pneumaticPart->quantity = $request->input('quantity');
        $pneumaticPart->save();

        return response()->json(['status'=>'success']);

    }

    /**
     * Upadte the pnuematic data accroding to the edit data
     * @param PneumaticPart $pneumaticPart
     * @param pneumaticPartStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PneumaticPart $pneumaticPart, PneumaticPartStoreRequest $request){
        $pneumaticPart->category_id = 1;
        $pneumaticPart->part = $request->input('part');
        $pneumaticPart->description = $request->input('description');
        $pneumaticPart->tube_size = $request->input('tubesize');
        $pneumaticPart->warranty = $request->input('warranty');
        $pneumaticPart->quantity = $request->input('quantity');
        $pneumaticPart->save();

        return response()->json(['status'=>'success']);

    }

}
