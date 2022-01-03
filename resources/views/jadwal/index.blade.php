@extends('app')
@section('content')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
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
              <h3 class="mb-0">Jadwal Pelayanan</h3>
            </div>
            <div class="col-4 text-right">
              <button id="#btn-add" data-target="#modal-jadwal-create" class="btn-add btn btn-primary" data-toggle="modal" data-placement="left" title="Tambah Jadwal Pelayanan"><i class="bi bi-plus-circle"></i></button>
          </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="no">No</th>
                <th scope="col" class="sort" data-sort="tgl_pelayanan">Tanggal</th>
                <th scope="col" class="sort" data-sort="jam_pelayanan">Waktu</th>
                <th scope="col" class="sort" data-sort="tempat_pelayanan">Tempat</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i=1;
              @endphp
              @foreach ($jadwal as $item)
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{date('d F Y',strtotime($item->tgl_pelayanan))}}</td>
                <td>{{date('H:i:s',strtotime($item->jam_pelayanan))}}</td>
                <td>{{$item->tempat_pelayanan}}</td>
                <td>
                  @csrf 
                  <a href="/jadwal/{{$item->id}}/delete" onclick="return sweetDel(event)"
                      class="btn btn-danger"><i class="bi bi-trash"></i></a>
                      <button id="#btn-edit" data-target="#modal-jadwal-edit" class="btn-edit btn btn-primary" data-toggle="modal" data-placement="left" value="{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fas fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

@include('jadwal.modalCreate');
@include('jadwal.modalEdit');

<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script>
$('.btn-edit').click(function(e) {
    e.preventDefault();
    var id = $(this).val();
    $.get('jadwal/' + id + '/edit', function (data) {
         $('#edit_id').val(id);
         $('#edit_tgl_pelayanan').val(data.data.tgl_pelayanan);
         $('#edit_jam_pelayanan').val(data.data.jam_pelayanan);
         $('#edit_tempat_pelayanan').val(data.data.tempat_pelayanan);
     })
});
</script>

@endsection