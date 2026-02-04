@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="GET" action="{{ route('patients.index') }}" class="row g-2 mb-3">
            <div class="col-md-4">
                <input
                    type="text"
                    name="patient"
                    class="form-control"
                    placeholder="Patient name"
                    value="{{ request('patient') }}"
                >
            </div>

            <div class="col-md-4">
                <select name="disease_id" class="form-select">
                    <option value="">-- Any disease --</option>
                    @foreach($diseases as $disease)
                        <option value="{{ $disease->id }}"
                            {{ request('disease_id') == $disease->id ? 'selected' : '' }}>
                            {{ $disease->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 d-flex gap-2">
                <button class="btn btn-primary">Search</button>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>



        <a href="{{ route('patients.create') }}" class="btn btn-success mb-3">Add Patient</a>


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Diseases</th>
                <th width="180">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>
                        @foreach($patient->diseases as $disease)
                            <span class="badge bg-info">{{ $disease->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete patient?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No patients found</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $patients->links() }}

    </div>
@endsection
