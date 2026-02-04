<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = auth()->user()->patients()->with('diseases')->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {

        $diseases = Disease::orderBy('name')->get();
        return view('patients.create', compact('diseases'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'diseases' => 'array'
        ]);

        $patient = Patient::create([
            'name' => $request->name,
            'doctor_id' => auth()->id()
        ]);

        if($request->diseases){
            $patient->diseases()->attach($request->diseases);
        }

        return redirect()->route('patients.index')->with('success', 'Patient added');
    }

    public function edit(Patient $patient)
    {
        $this->authorize('update', $patient);

        $diseases = Disease::orderBy('name')->get();
        return view('patients.edit', compact('patient', 'diseases'));
    }

    public function update(Request $request, Patient $patient)
    {
        $this->authorize('update', $patient);

        $request->validate([
            'name' => 'required|string|max:255',
            'diseases' => 'array'
        ]);

        $patient->update(['name' => $request->name]);
        $patient->diseases()->sync($request->diseases ?? []);

        return redirect()->route('patients.index')->with('success', 'Patient updated');
    }

    public function destroy(Patient $patient)
    {
        $this->authorize('delete', $patient);

        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted');
    }
}
