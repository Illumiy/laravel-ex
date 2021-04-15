<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shit;

class ShitController extends Controller
{
    public function index()
    {
        $shits = Shit::all()->toArray();
        return array_reverse($shits);      
    }

    public function store(Request $request)
    {
        $shit = new Shit([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $shit->save();

        return response()->json('Shit created!');
    }

    public function show($id)
    {
        $shit = Shit::find($id);
        return response()->json($shit);
    }

    public function update($id, Request $request)
    {
        $shit = Shit::find($id);
        $shit->update($request->all());

        return response()->json('Shit updated!');
    }

    public function destroy($id)
    {
        $shit = Shit::find($id);
        $shit->delete();

        return response()->json('Shit deleted!');
    }
}
