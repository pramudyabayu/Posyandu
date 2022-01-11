@extends('app')
@section('content')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Kader</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
    <!-- Card header -->
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Data Kader Posyandu</h3>
            </div>
            <div class="col-4 text-right">
              <a href="kader/exportpdf" class="btn btn-light btn-sm" data-placement="left" title="Download Data Kader PDF">PDF</a>
              <a href="kader/export-excel" class="btn btn-light btn-sm" data-placement="left" title="Download Data Kader Excel">Excel</a>
              <a href="kader/export-csv" class="btn btn-light btn-sm" data-placement="left" title="Download Data Kader CSV">CSV</a>
              <button id="#btn-add" data-target="#modal-kader-create" class="btn-add btn btn-primary btn-sm" data-toggle="modal" data-placement="left" title="Tambah Data Kader"><i class="bi bi-plus-circle"></i></button>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="no">No</th>
                <th scope="col" class="sort" data-sort="nama_kader">Nama</th>
                <th scope="col" class="sort" data-sort="no_hp_kader">No Hp</th>
                <th scope="col" class="sort" data-sort="alamat_kader">Alamat</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($kader as $item)
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$item->nama_kader}}</td>
                <td>{{$item->no_hp_kader}}</td>
                <td>{{$item->alamat_kader}}</td>
                <td>
                  @csrf
                  <a href="/kader/{{$item->id}}/delete" onclick="return sweetDel(event)"
                      class="btn btn-danger"><i class="bi bi-trash"></i></a>
                  <button id="#btn-edit" data-target="#modal-kader-edit" class="btn-edit btn btn-primary" data-toggle="modal" data-placement="left" value="{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4">
        {{ $kader->links() }}
      </div>
      </div>
    </div>
  </div>
</div>

@include('kader.modalCreate');
@include('kader.modalEdit');

<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script>
$('.btn-edit').click(function(e) {
    e.preventDefault();
    var id = $(this).val();
    $.get('kader/' + id + '/edit', function (data) {
         $('#edit_id').val(id);
         $('#edit_nama_kader').val(data.data.nama_kader);
         $('#edit_no_hp_kader').val(data.data.no_hp_kader);
         $('#edit_alamat_kader').val(data.data.alamat_kader);
     })
});
</script>

@endsection