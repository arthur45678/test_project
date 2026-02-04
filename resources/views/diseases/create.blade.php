@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('diseases.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label>Diseases</label>
                <select name="diseases[]" class="form-select" multiple>
                    @foreach($diseases as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Add Patient</button>
        </form>
    </div>
@endsection
