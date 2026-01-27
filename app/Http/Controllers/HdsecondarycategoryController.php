<?php

namespace App\Http\Controllers;
use App\Models\Hdsecondarycategory;
use Illuminate\Http\Request;

class HdsecondarycategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hdsecondarycategories = Hdsecondarycategory::all();
        return view('hdsecondarycategories.index', compact('hdsecondarycategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hdsecondarycategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'secondarycatname.hu' => 'required|string',
            'secondarycatname.en' => 'required|string',
            'secondarycatname.de' => 'nullable|string',
        ]);

        Hdsecondarycategory::create([
            'secondarycatname' => $request->input('secondarycatname'),
        ]);

        return redirect()->route('hdsecondarycategories.index');
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
    public function edit(Hdsecondarycategory $hdsecondarycategory)
    {
        //dd($hdsecondarycategory);
        return view('hdsecondarycategories.edit', compact('hdsecondarycategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hdsecondarycategory $hdsecondarycategory)
    {
        $hdsecondarycategory->update([
            'secondarycatname' => $request->input('secondarycatname'),
        ]);

        return redirect()->route('hdsecondarycategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
