<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctor = auth()->user();


        $patients = $doctor->patients()
            ->when($request->filled('disease'), function ($q) use ($request) {
                $q->whereHas('diseases', function ($d) use ($request) {
                    $d->where('name', 'like', '%' . $request->disease . '%');
                });
            })
            ->when($request->sort === 'patient', fn($q) => $q->orderBy('name'))
            ->with('diseases') // жадная загрузка после фильтра
            ->get();



        return view('doctor.index', compact('patients'));
    }

    public function show(Request $request, Doctor $doctor)
    {
        $query = $doctor->patients()->with('diseases');


        if ($request->filled('disease')) {
            $query->whereHas('diseases', fn($q) => $q->where('name', 'like', '%' . $request->disease . '%'));
        }


        if ($request->sort === 'patient') {
            $query->orderBy('name');
        }


        if ($request->sort === 'disease') {
            $query->join('disease_patient', 'patients.id', '=', 'disease_patient.patient_id')
                ->join('diseases', 'diseases.id', '=', 'disease_patient.disease_id')
                ->orderBy('diseases.name');
        }


        $patients = $query->get();


        return view('doctor.show', compact('doctor', 'patients'));
    }
}
