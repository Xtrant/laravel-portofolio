@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Education</p>
    <div class="pb-3"><a href="{{ route('education.create') }}" class="btn btn-primary">+ Add Education</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Education Level</th>
                    <th>Institution Name</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Lulus</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php $i = 1 ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item -> judul }}</td>
                <td>{{ $item -> info1 }}</td>
                <td>{{ $item -> tahun_mulai }}</td>
                <td>{{ $item -> tahun_akhir }}</td>
                <td>
                    <a href="{{ route('education.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form onsubmit="return confirm('Confirm?')" action="{{ route('education.destroy', $item->id) }}" class="d-inline" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Delete</button></form>
                </td>
            </tr>
            <?php $i++?>
            @endforeach
           
        </tbody>
        </table>

    </div>
@endsection
