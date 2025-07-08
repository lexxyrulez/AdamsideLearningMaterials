@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h2 style="color: #03a9fc;">Create Topic Notes</h2>
    <form action="{{ route('admin.notes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 15px;">
            <label>Grade</label>
            <select name="grade_id" required>
                @foreach($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Curricula</label>
            <select name="curriculum_ids[]" multiple required>
                @foreach($curricula as $curriculum)
                    <option value="{{ $curriculum->id }}">{{ $curriculum->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Title</label>
            <input type="text" name="title" required>
        </div>
        <div id="content-container" style="margin-bottom: 15px;">
            <label>Content (Add Sections or Questions)</label>
            <div id="content-items">
                <div style="margin-bottom: 10px;">
                    <input type="text" name="content[0][subtitle]" placeholder="Subtitle (optional)">
                    <input type="file" name="content[0][image]" accept="image/*">
                    <input type="text" name="content[0][question]" placeholder="Question (optional)">
                </div>
            </div>
            <button type="button" id="add-content" style="padding: 5px 10px; background: #03a9fc; color: #fff; border: none; border-radius: 5px;">Add Section/Question</button>
        </div>
        <button type="submit" style="padding: 10px 20px; background: #03a9fc; color: #fff; border: none; border-radius: 5px;">Save Notes</button>
    </form>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif
</div>

<script>
    let contentIndex = 1;

    document.getElementById('add-content').addEventListener('click', function() {
        const container = document.getElementById('content-items');
        const newItem = document.createElement('div');
        newItem.style.marginBottom = '10px';
        newItem.innerHTML = `<input type="text" name="content[${contentIndex}][subtitle]" placeholder="Subtitle (optional)"> <input type="file" name="content[${contentIndex}][image]" accept="image/*"> <input type="text" name="content[${contentIndex}][question]" placeholder="Question (optional)">`;
        container.appendChild(newItem);
        contentIndex++;
    });
</script>
@endsection