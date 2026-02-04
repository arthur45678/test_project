@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">My patients</h2>

    <form class="row g-2 mb-4">
        <div class="col-md-5">
            <input
                type="text"
                name="disease"
                value="{{ request('disease') }}"
                class="form-control"
                placeholder="Search by disease"
            >
        </div>

        <div class="col-md-4">
            <select name="sort" class="form-select">
                <option value="">Sort</option>
                <option value="patient" @selected(request('sort')=='patient')>
                    Patient name
                </option>
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary w-100">Apply</button>
        </div>
    </form>

    @forelse($patients as $patient)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $patient->name }}</h5>

                <ul class="mb-0">
                    @foreach($patient->diseases as $disease)
                        <li>{{ $disease->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            No patients found
        </div>
    @endforelse
</div>
@endsection
