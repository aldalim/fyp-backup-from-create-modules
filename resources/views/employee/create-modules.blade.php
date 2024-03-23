@extends('employee-layout')

@section('content')
<div style="padding-bottom: 2rem;"><h1>Create New Module</h1>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<form action="{{ route('modules.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Module Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Module Image:</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Module</button>
</form>
@endsection
