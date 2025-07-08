@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h2 style="color: #03a9fc;">Edit Topic Notes</h2>
    <form action="{{ route('admin.notes.update', $note->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label>Grade</label>
            <select name="grade_id" required>
                @foreach($grades as $grade)
                    <option value="{{ $grade->id }}" {{ $note->grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Curricula</label>
            <select name="curriculum_ids[]" multiple required>
                @foreach($curricula as $curriculum)
                    <option value="{{ $curriculum->id }}" {{ in_array($curriculum->id, json_decode($note->curriculum_ids, true)) ? 'selected' : '' }}>{{ $curriculum->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Title</label>
            <input type="text" name="title" value="{{ $note->title }}" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Content (Use &lt;h3&gt; for topics, {{ '{{image0}}' }}, {{ '{{image1}}' }}, etc. for new images, and write questions inline)</label>
            <textarea name="content" rows="10" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">{{ $note->content }}</textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Upload New Images (Optional)</label>
            <input type="file" name="images[]" multiple accept="image/*">
            <p>Insert placeholders like {{ '{{image0}}' }}, {{ '{{image1}}' }} in the content for new images. Match the number of placeholders to the number of images uploaded. Existing images will remain unless replaced.</p>
            @foreach(json_decode($note->content, true) as $index => $section)
                @if(isset($section['image']) && $section['image'])
                    <p>Current Image {{ $index }}: <a href="{{ asset('storage/' . $section['image']) }}" target="_blank">View</a> (Will be replaced if new image uploaded)</p>
                @endif
            @endforeach
        </div>
        <button type="submit" style="padding: 10px 20px; background: #03a9fc; color: #fff; border: none; border-radius: 5px;">Update Notes</button>
    </form>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
</div>
@endsection