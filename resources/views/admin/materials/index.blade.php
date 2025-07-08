@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h2>Admin Materials</h2>
    <a href="{{ route('admin.materials.create') }}" style="padding: 10px; background: #03a9fc; color: #fff; text-decoration: none; border-radius: 5px;">Upload PDF</a>
    @if($materials->isEmpty())
        <p>No materials available.</p>
    @else
        <ul>
            @foreach($materials as $material)
                <li>{{ $material->title }} - <a href="{{ route('materials.show', $material->id) }}">View</a> | <a href="{{ route('admin.materials.edit', $material->id) }}">Edit</a> | <form action="{{ route('admin.materials.destroy', $material->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; color: #d32f2f; cursor: pointer;">Delete</button>
                </form></li>
            @endforeach
        </ul>
    @endif
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
</div>
@endsection