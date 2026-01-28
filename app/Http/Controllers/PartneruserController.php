<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partneruser;
use App\Models\Partner;

class PartneruserController extends Controller
{
    
    protected function validateRec(Request $request) {
        $data = $request->validate([
            'partnerid' => 'required|integer',
            'name' => 'required|string|max:255',
            'loginname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $data['isactive'] = $request->boolean('isactive');
        $data['isadmin'] = $request->boolean('isadmin');
        
        return $data;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnerusers = PartnerUser::with('partner')->paginate(15);        
        
        return view('partnerusers.index', compact('partnerusers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partners = Partner::where('active', 1)
            ->orderBy('partnername')
            ->pluck('partnername', 'id');
        
        return view('partnerusers.create', compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Partneruser::create($this->validateRec($request));
        return redirect()->route('partnerusers.index')
            ->with('success', __('messages.partneruser_created'));        
    }

    /**
     * Display the specified resource.
     */
    public function show(Partneruser $partneruser)
    {
        return view('partnerusers.edit', compact('partneruser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partneruser $partneruser)
    {
        $partners = Partner::where('active', 1)
            ->orderBy('partnername')
            ->pluck('partnername', 'id');
        
        return view('partnerusers.edit', compact('partneruser', 'partners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partneruser $partneruser)
    {
        $data = $request->validate([
            'partnerid' => 'required|integer',
            'name' => 'required|string|max:255',
            'loginname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);
        
        $data['isactive'] = $request->boolean('isactive');
        $data['isadmin'] = $request->boolean('isadmin');
        
        $partneruser->update($data);
        
        return redirect()->route('partnerusers.index')
            ->with('success', __('messages.partneruser_updated'));        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
