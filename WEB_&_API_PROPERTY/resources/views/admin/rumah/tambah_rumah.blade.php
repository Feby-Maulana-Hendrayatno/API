@extends("layouts.template")

@section("ajax_calendar_js")
Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
<script>
    function viewImage()
    {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection

@section("header")

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> Rumah </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/dashboard') }}"> Dashboard </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/data_rumah') }}"> Data Rumah </a>
                </li>
                <li class="breadcrumb-item active"> Data Kategori Tari </li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section("content")

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/admin/rumah/') }}">
                    <h3 class="card-title">
                        <span class="btn btn-secondary col fileinput-button dz-clickable">
                            <i class="fa fa-reply"></i>
                            <span >Kembali</span>
                        </span>
                    </h3>
                </a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/admin/rumah/store/') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Rumah</label>
                            <input type="text" name="nama_rumah" class="form-control" id="" placeholder="Masukan Nama" required>
                            <div class="text-danger">
                            <!-- @error('nama_rumah')
                                {{ $message }}
                            @enderror -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="number" name="alamat" class="form-control" id="" placeholder="alamat Rumah" required>
                        </div>
                        <div class="form-group">
                            <label>Kontak</label>
                            <input type="text" name="kontak" class="form-control" id="" placeholder="kontak" required>
                            <div class="text-danger">
                            <!-- @error('kontak')
                            {{ $message }}
                            @enderror -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="" name="harga" class="form-control" id="" placeholder="Harga Rumah" required>
                            <div class="text-danger">
                            <!-- @error('harga')
                            {{ $message }}
                            @enderror -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto Rumah</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file"  name="foto" class="form-control" id="foto" placeholder="Masukan Foto/Gambar" required onchange="viewImage()">
                            <div class="text-danger">
                            <!-- @error('foto_Rumah')
                            {{ $message }}
                            @enderror -->
                            </div>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
