<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Total;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of all point allocation entries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Point::all();
    }

    /**
     * Store a newly created point allocation entry in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required'
        ]);

        $total = Total::find(2);
        if ($request->amount < $total->total) {
            // 1. Create point
            $point = Point::create([
                'description' => $request->description,
                'amount' => $request->amount
            ]);
            // 2. Decrement total

            return $point->fresh();
        }
        else {
            return "Not enough points";
        }
    }

    public function setTotal() {
        Total::create(['total' => 300]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
