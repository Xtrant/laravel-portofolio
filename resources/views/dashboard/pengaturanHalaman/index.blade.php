@extends('dashboard.layout')

@section('konten')
<form action="{{ route('pengaturanHalaman.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="" class="col-sm-2">Interest</label>
        <div class="col-sm-6">
            <select name="_halaman_interest" id="" class="form-control form-control-sm">
                <option value="">-choose-</option>
                @foreach ($datahalaman as $item)
                <option value="{{ $item->id }}"  {{ get_meta_value('_halaman_interest')==$item->id? 'selected' : '' }}>{{ $item->judul }}</option>
                    
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2">Award</label>
        <div class="col-sm-6">
            <select name="_halaman_award" id="" class="form-control form-control-sm">
                <option value="">-choose-</option>
                @foreach ($datahalaman as $item)
                <option value="{{ $item->id }}"  {{ get_meta_value('_halaman_award')==$item->id? 'selected' : '' }}>{{ $item->judul }}</option>
                    
                @endforeach
            </select>
        </div>
    </div>

    <button class="btn btn-primary" name="simpan" type="submit">SAVE</button>


</form>



@endsection
