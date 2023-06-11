@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('halaman.index') }}" class="btn btn-secondary">
            <--     Back</a>
    </div>
    <form action="{{ route('halaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control form-control-sm" name="title" value="{{ Session::get('title') }}" id="title" aria-describedby="helpId" placeholder="Title">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="" rows="5">{{ Session::get('content') }}</textarea>
            <button class="btn btn-primary" name="save" type="submit">Save</button>
        </div>



    </form>
@endsection
