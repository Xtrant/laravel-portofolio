@extends('dashboard.layout')

@section('konten')
<form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-between">
        <div class="col-5">
            <h3>Profile</h3>

            @if (get_meta_value('_foto'))
            <img style="max-height: 100px; max-width =100px" src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" alt="">
                
            @endif

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control form-control-sm" name="_foto" id="_foto">
            </div>

            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control form-control-sm" name="_kota" id="_kota" value="{{ get_meta_value('_kota') }}">
            </div>

            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control form-control-sm" name="_provinsi" id="_provinsi" value= "{{ get_meta_value('_provinsi') }}">
            </div>

            <div class="mb-3">
                <label for="noHp" class="form-label">Nomor Hp</label>
                <input type="text" class="form-control form-control-sm" name="_noHp" id="_noHp" value= "{{ get_meta_value('_noHp') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control form-control-sm" name="_email" id="_email" value= "{{ get_meta_value('_email') }}">
            </div>

        </div>
        <div class="col-5">
            <h3>Akun Media Sosial</h3>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="text" class="form-control form-control-sm" name="_facebook" id="_facebook" value= "{{ get_meta_value('_facebook') }}">
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" class="form-control form-control-sm" name="_instagram" id="_instagram" value= "{{ get_meta_value('_instagram') }}">
            </div>

            <div class="mb-3">
                <label for="github" class="form-label">Github</label>
                <input type="text" class="form-control form-control-sm" name="_github" id="_github" value= "{{ get_meta_value('_github') }}">
            </div>

            <div class="mb-3">
                <label for="linkedin" class="form-label">Linkedin</label>
                <input type="text" class="form-control form-control-sm" name="_linkedin" id="_linkedin" value= "{{ get_meta_value('_linkedin') }}">
            </div>
        </div>
    </div>

    <button class="btn btn-primary" name="simpan" type="submit">SAVE</button>


</form>



@endsection
