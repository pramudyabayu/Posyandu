@extends('app')
@section('content')

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Imunisasi</a></li>
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
            <h3 class="mb-0">Data Imunisasi</h3>
          </div>
          <div class="col-4 text-right">
            <a href="#modal-imunisasi-create" class="btn btn-sm btn-primary bi bi-plus-circle" data-toggle="modal" data-placement="left" title="Tambah Data Imunisasi"></a>
          </div>
        </div>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col" class="sort" data-sort="no">No</th>
              <th scope="col" class="sort" data-sort="tgl_imunisasi">Tanggal Imunisasi</th>
              <th scope="col" class="sort" data-sort="nama_balita">Nama Balita</th>
              <th scope="col" class="sort" data-sort="jenis_imunisasi">Jenis Imunisasi</th>
              <th scope="col" class="sort" data-sort="aksi">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach($imunisasi as $key => $item)
            <tr>
            <th scope="row">{{ $key + $imunisasi->firstItem()}}</th>
              <td>{{date('d F Y',strtotime($item->tgl_imunisasi))}}</td>
              <td>{{$item->balita->nama_balita}}</td>
              <td>{{$item->jenis_imunisasi}}</td>                                
              <td>
                  @csrf
                  <a href="/imunisasi/{{$item->id}}/delete" onclick="return sweetDel(event)"
                      class="btn btn-danger"><i class="bi bi-trash"></i></a>
                  <button id="#btn-edit" data-target="#modal-imunisasi-edit" class="btn-edit btn btn-primary" data-toggle="modal" data-placement="left" value="{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                </td>
            </tr>
                @endforeach
          </tbody>
        </table>
      </div>

     <!-- Card footer -->
     <div class="card-footer py-4">
      {{ $imunisasi->links() }}
    </div>
  </div>
</div>
</div>

@include('imunisasi.modalCreate')
@include('imunisasi.modalEdit')

<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script>
$('.btn-edit').click(function(e) {
    e.preventDefault();
    var id = $(this).val();
    $.get('imunisasi/' + id + '/edit', function (data) {
          console.log(data);
          $('#edit_id').val(id);
          $('#edit_tgl_imunisasi').val(data.data.tgl_imunisasi);
          $('#edit_balita_id').html(data.output_nama_balita);
          $('#edit_jenis_imunisasi').html(data.output_jenis_imunisasi);
     })
});
</script>


@endsection