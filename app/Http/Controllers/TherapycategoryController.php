<?php

namespace App\Http\Controllers;
use App\Models\Therapycategory;
use Illuminate\Http\Request;

class TherapycategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $therapycategories = Therapycategory::all();
        return view('therapycategories.index', compact('therapycategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('therapycategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'therapycatname.hu' => 'required|string',
            'therapycatname.en' => 'required|string',
            'therapycatname.de' => 'nullable|string',
        ]);

        Therapycategory::create([
            'therapycat' => $request->input('therapycatname'),
        ]);

        return redirect()->route('therapycategories.index');
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
    public function edit(Therapycategory $therapycategory)
    {
        return view('therapycategories.edit', compact('therapycategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Therapycategory $therapycategory)
    {
        //dd($request);
        
        $request->validate([
            'therapycatname.hu' => 'required|string',
            'therapycatname.en' => 'required|string',
            'therapycatname.de' => 'nullable|string',
        ]);
        
        $therapycategory->update([
            'therapycat' => $request->input('therapycatname'),
        ]);

        return redirect()->route('therapycategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
