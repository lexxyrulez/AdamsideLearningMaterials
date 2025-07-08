@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h2 style="color: #03a9fc;">Manage Notes</h2>
    <a href="{{ route('admin.notes.create') }}" style="padding: 10px; background: #03a9fc; color: #fff; text-decoration: none; border-radius: 5px;">Create New Notes</a>
    @if($notes->isEmpty())
        <p>No notes available.</p>
    @else
        <ul>
            @foreach($notes as $note)
                <li style="margin-bottom: 15px;">
                    {{ $note->title }} (Grade: {{ $note->grade->name }})
                    <a href="{{ route('admin.notes.edit', $note->id) }}" style="margin-left: 10px; color: #03a9fc;">Edit</a>
                    <form action="{{ route('admin.notes.destroy', $note->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #d32f2f; cursor: pointer;">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
</div>
@endsection