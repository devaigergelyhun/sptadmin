<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();

        return view('partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Partner::create($this->validateRec($request));
        return redirect()->route('partners.index')
            ->with('success', __('messages.partner_created'));
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
    public function edit(Partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update($this->validateRecord($request));
        
        return redirect()->route('partners.index')
            ->with('success', __('messages.partner_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    protected function validateRec(Request $request) {
        
        $data = $request->validate([
            'partnername' => 'required|string|max:250',
            'country'  => 'nullable|string|max:50', // VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_bin',
            'deflang' => 'nullable|string|max:2',//` VARCHAR(2) NULL DEFAULT NULL COLLATE 'utf8_bin',
        ]);
        $data['active'] = $request->boolean('active');
        
        return $data;        
    }
}
