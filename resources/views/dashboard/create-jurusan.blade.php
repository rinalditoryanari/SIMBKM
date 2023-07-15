@extends('layout.dashboard')
@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Buat Prodi</h4>
            </div>

            <div class="card-body">
                <form action="/dashboard/jurusan" method="post">
                    @csrf
                    <div class="row">            
                        <div class="mb-3 col-10">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Masukan Nama Jurusan" value="{{ old('name') }}" required autofocus>  
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-10 mb-3">
                            <label for="fakultas_id" class="form-label">Jurusan</label>
                            <select class="form-select" name="fakultas_id">
                                <option  disabled selected>Pilih Jurusan</option>
                                @foreach($fakultas as $data)
                                    @if(old('fakultas_id') == $data->id)
                                        <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 d-flex">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="status" id="status" value="Aktif" checked="checked">
                                <label class="custom-control-label" for="status">Aktif</label>
                            </div>
                            <div class="form-check ms-3">
                              <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Aktif">
                              <label class="custom-control-label" for="status">Tidak Aktif</label>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="d-flex align-items-center ">
                            <div class="ms-md-auto d-flex">
                              <Button type="submit" class="btn btn-primary align-items-center d-flex m-4 ">Submit</Button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection