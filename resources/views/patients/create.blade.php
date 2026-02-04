@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ isset($patient) ? route('patients.update', $patient) : route('patients.store') }}" method="POST">
            @csrf
            @if(isset($patient)) @method('PUT') @endif


            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $patient->name ?? old('name') }}">
            </div>



            <div class="mb-3">
                <label>Diseases</label>
                <select name="diseases[]" class="form-select" multiple>
                    @foreach($diseases as $disease)
                        <option value="{{ $disease->id }}"
                                @if(isset($patient) && $patient->diseases->contains($disease->id)) selected @endif
                        >{{ $disease->name }}</option>
                    @endforeach
                </select>
            </div>


            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
