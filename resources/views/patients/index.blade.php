@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('patients.create') }}" class="btn btn-success mb-3">Add Patient</a>

        @foreach($patients as $p)
            <div class="card mb-2">
                <div class="card-body">
                    <h5>{{ $p->name }}</h5>
                    <ul>
                        @foreach($p->diseases as $d)
                            <li>{{ $d->name }}</li>
                        @endforeach
                    </ul>

                    <a href="{{ route('patients.edit', $p) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('patients.destroy', $p) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
