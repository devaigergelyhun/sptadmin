<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Therapy;
use App\Models\Hdprimarycategory;
use App\Models\Hdsecondarycategory;
use App\Models\Therapycategory;

class TherapyController extends Controller
{
    public function index(Request $request)
    {
        $query = Therapy::query();

        if ($request->filled('therapyname')) {
            $query->where('therapyname', 'like', '%' . $request->therapyname . '%');
        }

        $therapies = $query->orderBy('therapyname')
            ->paginate(15)
            ->withQueryString();

        return view('therapies.index', compact('therapies'));
    }

    public function create()
    {
        $primaryCategories = Hdprimarycategory::all()
            ->pluck('pricatname', 'id'); // name = accessor!

        $secondarycategories = Hdsecondarycategory::all()
            ->pluck('seccatname', 'id');
        
        $therapycategories = Therapycategory::all()
            ->pluck('therapycatname', 'id');
        
        return view('therapies.create', compact('primaryCategories', 'secondarycategories', 'therapycategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ptid' => 'required|max:15',
            'therapyname.hu' => 'required|string|max:255',
            'therapyname.en' => 'nullable|string|max:255',
            'therapyname.de' => 'nullable|string|max:255',
            'hdprimarycategoryid' => 'required|integer',
            'hdsecondarycategoryid' => 'required|integer',
            'therapycategoryid' => 'required|integer',
            'temperature' => 'nullable|integer',
            'therapyinfo.hu' => 'nullable|string',
            'therapyinfo.en' => 'nullable|string',
            'therapyinfo.de' => 'nullable|string',
        ]);

        $data['lowpressure'] = $request->boolean('lowpressure');
	$data['midpressure'] = $request->boolean('midpressure');
	$data['highpressure'] = $request->boolean('highpressure');

        $data['timerangeshort'] = $request->boolean('timerangeshort');
        $data['timerangemiddle'] = $request->boolean('timerangemiddle');
        $data['timerangelong'] = $request->boolean('timerangelong');
        
        Therapy::create($data);

        return redirect()->route('therapies.index')
            ->with('success', 'Terápia létrehozva.');
    }

    public function edit(Therapy $therapy)
    {
        
        $primaryCategories = Hdprimarycategory::all()
            ->pluck('pricatname', 'id'); // name = accessor!

        $secondarycategories = Hdsecondarycategory::all()
            ->pluck('seccatname', 'id');
        
        $therapycategories = Therapycategory::all()
            ->pluck('therapycatname', 'id');
        
        return view('therapies.edit', compact('therapy', 'primaryCategories', 'secondarycategories', 'therapycategories'));
    }

    public function update(Request $request, Therapy $therapy)
    {
        
        $data = $request->validate([
            'ptid' => 'required|max:15',
            'therapyname.hu' => 'required|string|max:255',
            'therapyname.en' => 'nullable|string|max:255',
            'therapyname.de' => 'nullable|string|max:255',
            'hdprimarycategoryid' => 'required|integer',
            'hdsecondarycategoryid' => 'required|integer',
            'therapycategoryid' => 'required|integer',
            'temperature' => 'nullable|integer',
            'therapyinfo.hu' => 'nullable|string',
            'therapyinfo.en' => 'nullable|string',
            'therapyinfo.de' => 'nullable|string',
        ]);

        $data['lowpressure'] = $request->boolean('lowpressure');
	$data['midpressure'] = $request->boolean('midpressure');
	$data['highpressure'] = $request->boolean('highpressure');

        $data['timerangeshort'] = $request->boolean('timerangeshort');
        $data['timerangemiddle'] = $request->boolean('timerangemiddle');
        $data['timerangelong'] = $request->boolean('timerangelong');        
        
        $therapy->update($data);

        return redirect()->route('therapies.index')
            ->with('success', 'Terápia módosítva.');
    }

    public function destroy(Therapy $therapy)
    {
        $therapy->delete();

        return redirect()->route('therapies.index')
            ->with('success', 'Terápia törölve.');
    }
}