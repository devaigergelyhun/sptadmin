<?php

namespace App\Http\Controllers;
use App\Models\Hdprimarycategory;
use Illuminate\Http\Request;

class HdprimarycategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hdprimarycategories = Hdprimarycategory::all();
        return view('hdprimarycategories.index', compact('hdprimarycategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hdprimarycategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'primarycatname.hu' => 'required|string',
            'primarycatname.en' => 'required|string',
            'primarycatname.de' => 'nullable|string',
        ]);

        Hdprimarycategory::create([
            'primarycatname' => $request->input('primarycatname'),
        ]);

        return redirect()->route('hdprimarycategories.index');
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
    public function edit(Hdprimarycategory $hdprimarycategory)
    {
        //dd($hdprimarycategory);
        return view('hdprimarycategories.edit', compact('hdprimarycategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hdprimarycategory $hdprimarycategory)
    {
        $hdprimarycategory->update([
            'primarycatname' => $request->input('primarycatname'),
        ]);

        return redirect()->route('hdprimarycategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
