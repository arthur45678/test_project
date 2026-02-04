@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Edit Disease</h3>

        <form action="{{ route('diseases.update', $disease) }}" method="POST">
            @csrf
            @method('PUT') <!-- обязательно для update -->

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $disease->name) }}" required>
            </div>

            <button class="btn btn-primary">Update Disease</button>
            <a href="{{ route('diseases.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
