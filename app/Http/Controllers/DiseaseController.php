<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::orderBy('name')->get();
        return view('diseases.index', compact('diseases'));
    }

    public function create()
    {
        $diseases= Disease::orderBy('name')->get();
        return view('diseases.create', compact('diseases'));
    }

    public function store(Request $request)
    {

        $request->validate(['name' => 'required|string|max:255']);
        Disease::create(['name' => $request->name]);
        return redirect()->route('diseases.index')->with('success', 'Disease added');
    }

    public function edit(Disease $disease)
    {
        return view('diseases.edit', compact('disease'));
    }

    public function update(Request $request, Disease $disease)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $disease->update(['name' => $request->name]);
        return redirect()->route('diseases.index')->with('success', 'Disease updated');
    }

    public function destroy(Disease $disease)
    {
        $disease->delete();
        return redirect()->route('diseases.index')->with('success', 'Disease deleted');
    }
}
