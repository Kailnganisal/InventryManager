<?php

namespace App\Http\Controllers;

use App\Models\PneumaticPart;
use Illuminate\Http\Request;

class pneumaticController extends Controller
{
    public function index(Request $request){
        $pneumatics = pneumaticPart::when(request('search_key'), function ($query) {
            $query->where('part', 'like' , request('search_key').'%')
                ->orWhere('tube_size', request('search_key'));
        })->get();

        return response()->json($pneumatics);
    }

    public function destroy(pneumaticPart $pneumaticPart){
        $pneumaticPart->delete();
        return response()->json(['status'=>'success']);
    }

    public function edit(pneumaticPart $pneumaticPart){
        return response()->json($pneumaticPart);
    }

    public function store(Request $request){
         $request->validate([
            'part'=> 'required',
            'description'=>'required',
            'tubesize'=>'required | integer',
            'warranty'=>'required',
            'quantity'=>'required | integer'
        ]);
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

    public function update(PneumaticPart $pneumaticPart, Request $request){
        $request->validate([
            'part'=> 'required',
            'description'=>'required',
            'tubesize'=>'required | integer',
            'warranty'=>'required',
            'quantity'=>'required | integer'
        ]);
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
