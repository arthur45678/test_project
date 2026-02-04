@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('diseases.create') }}" class="btn btn-success mb-3">Add Disease</a>

        <ul class="list-group">
            @foreach($diseases as $d)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $d->name }}
                    <span>
                <a href="{{ route('diseases.edit', $d) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('diseases.destroy', $d) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
