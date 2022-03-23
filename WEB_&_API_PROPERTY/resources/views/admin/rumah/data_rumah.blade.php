@extends("layouts.template")

@section('title')
Data Rumah
@stop

@section("content")

<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ url('/rumah/data_rumah/tambah/') }}">
            {{ csrf_field() }}
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <span class="fa fa-plus"></span> Tambah Data
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="data_rumah" class="col-sm-2 col-form-label">Rumah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="data_rumah" name="data_rumah" placeholder="Kategori Tari">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-sm">
                        <span class="fa fa-plus"></span>
                        Tambah
                    </button>
                    <button type="reset" class="btn btn-default btn-sm float-right">
                        <span class="fa fa-refresh"></span>
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Data Role
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nama</th>
                            <!-- <th class="text-center">Deskripsi</th> -->
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Nohp</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 0 @endphp
                        @foreach($data_rumah as $rumah)
                        <tr>
                            <td class="text-center">{{ ++$id }}.</td>
                            <td class="text-center">{{ $rumah->id_rumah }}</td>
                            <td class="text-center">
                                <a href="{{ url('/rumah/data_rumah/edit') }}/{{ $rumah->id }}" class="btn btn-primary btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <form method="POST" action="{{ url('/rumah/data_rumah/hapus') }}" style="display: inline;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $rumah->id }}">
                                    <button onclick="return confirm('Ingin di Hapus ?')" type="submit" class="btn btn-danger btn-sm">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
