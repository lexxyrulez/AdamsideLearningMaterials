@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h2>Edit Material</h2>
    <form action="{{ route('admin.materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label>Title</label>
            <input type="text" name="title" value="{{ $material->title }}" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Description</label>
            <textarea name="description">{{ $material->description }}</textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label>New File (PDF, optional)</label>
            <input type="file" name="file">
        </div>
        <button type="submit" style="padding: 10px; background: #03a9fc; color: #fff; border: none; border-radius: 5px;">Update</button>
    </form>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
</div>
@endsection