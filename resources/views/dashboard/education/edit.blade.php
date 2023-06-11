@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('education.index') }}" class="btn btn-secondary">
            <--     Back</a>
    </div>
    <form action="{{ route('education.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Education Level</label>
            <input type="text" class="form-control form-control-sm" name="title" value="{{ $data->judul }}" id="title" aria-describedby="helpId" placeholder="Education Level">
        </div>

        <div class="mb-3">
            <label for="info1" class="form-label">Institution Name</label>
            <input type="text" class="form-control form-control-sm" name="info1" value="{{ $data->info1 }}" id="info1" aria-describedby="helpId" placeholder="Institution Name">
        </div>

        <div class="mb-3">
            <label for="info2" class="form-label">Jurusan/Program Studi</label>
            <input type="text" class="form-control form-control-sm" name="info2" value="{{ $data->info2 }}" id="info2" aria-describedby="helpId" placeholder="Jurusan/Program Studi">
        </div>

        <div class="mb-3">
            <label for="info3" class="form-label">Faculty</label>
            <input type="text" class="form-control form-control-sm" name="info3" value="{{ $data->info3 }}" id="info3" aria-describedby="helpId" placeholder="Fakultas">
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tahun Masuk</div>
                <div class="col-auto"><input type="number" class="form-control form-control-sm" name="tahun_mulai" placeholder="yyyy (1900-2023)" min="1900" max="2023" step="1" style="width: 150px" value="{{ $data->tahun_mulai }}"></div>
                <div class="col-auto">Tahun Lulus</div>
                <div class="col-auto"><input type="number" class="form-control form-control-sm" name="tahun_akhir" placeholder="yyyy (1900-2023)" min="1900" max="2023" step="1" style="width: 150px" value="{{ $data->tahun_akhir }}"></div>
            </div>
   
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="" rows="5">{{ $data->isi }}</textarea>
            <button class="btn btn-primary" name="save" type="submit">Save</button>
        </div>



    </form>
@endsection
