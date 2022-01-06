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
              <li class="breadcrumb-item"><a href="#">Balita</a></li>
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
              <h3 class="mb-0">Data Balita</h3>

          <!-- Search form -->
          <form class="form" method="get" action="{{ route('search') }}">
            <div class="form-group w-75 mb-3 mt-2">
                <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama balita">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </div>
          </form>
              
            </div>
            <div class="col-4 text-right">
              <a href="balita/exportpdf" class="btn btn-light btn-sm" data-placement="left" title="Download Data Balita PDF">PDF</a>
              <a href="balita/export-excel" class="btn btn-light btn-sm" data-placement="left" title="Download Data Balita Excel">Excel</a>
              <a href="balita/export-csv" class="btn btn-light btn-sm" data-placement="left" title="Download Data Balita CSV">CSV</a>
              <button id="#btn-add" data-target="#modal-balita-create" class="btn-add btn btn-primary btn-sm" data-toggle="modal" data-placement="left" title="Tambah Data Balita"><i class="bi bi-plus-circle"></i></button>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light"> 
              <tr>
                <th scope="col" class="sort" data-sort="no">No</th>
                <th scope="col" class="sort" data-sort="nama_balita">Nama Balita</th>
                <th scope="col" class="sort" data-sort="anak_ke">Anak Ke-</th>
                <th scope="col" class="sort" data-sort="tgl_lahir">Tanggal Lahir</th>
                <th scope="col" class="sort" data-sort="jenis_kelamin">Jenis Kelamin</th>
                <th scope="col" class="sort" data-sort="no_kk">No KK</th>
                <th scope="col" class="sort" data-sort="nik_balita">NIK Balita</th>
                <th scope="col" class="sort" data-sort="bb_lahir">BB Lahir</th>
                <th scope="col" class="sort" data-sort="tb_lahir">TB Lahir</th>
                <th scope="col" class="sort" data-sort="kia">KIA</th>
                <th scope="col" class="sort" data-sort="imd">IMD</th>
                <th scope="col" class="sort" data-sort="nama_ortu">Nama Ortu</th>
                <th scope="col" class="sort" data-sort="nik_ortu">NIK Ortu</th>
                <th scope="col" class="sort" data-sort="no_hp">No HP</th>
                <th scope="col" class="sort" data-sort="alamat">Alamat</th>
                <th scope="col" class="sort" data-sort="rt">RT</th>
                <th scope="col" class="sort" data-sort="rw">RW</th>
                <th scope="col" class="sort" data-sort="rw">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($balita as $key => $item)
              <tr>
                <th scope="row">{{ $key + $balita->firstItem()}}</th>
                <td>{{$item->nama_balita}}</td>
                <td>{{$item->anak_ke}}</td>
                <td>{{date('d F Y',strtotime($item->tgl_lahir))}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>{{$item->no_kk}}</td>
                <td>{{$item->nik_balita}}</td>
                <td>{{$item->bb_lahir}}</td>
                <td>{{$item->tb_lahir}}</td>
                <td>{{$item->kia}}</td>
                <td>{{$item->imd}}</td>
                <td>{{$item->nama_ortu}}</td>
                <td>{{$item->nik_ortu}}</td>
                <td>{{$item->no_hp}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->rt}}</td>
                <td>{{$item->rw}}</td>
                <td>
                @csrf
                <a href="/balita/{{$item->id}}/delete" onclick="return sweetDel(event)"
                  class="btn btn-danger"><i class="bi bi-trash"></i></a>
              <button id="#btn-edit" data-target="#modal-balita-edit" class="btn-edit btn btn-primary" data-toggle="modal" data-placement="left" value="{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
            </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $balita->links() }}
      </div>
    </div>
  </div>
</div>

@include('balita.modalCreate');
@include('balita.modalEdit');

<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script>
$('.btn-edit').click(function(e) {
    e.preventDefault();
    var id = $(this).val();
    $.get('balita/' + id + '/edit', function (data) {
         $('#edit_id').val(id);
         $('#edit_nama_balita').val(data.data.nama_balita);
         $('#edit_anak_ke').val(data.data.anak_ke);
         $('#edit_tgl_lahir').val(data.data.tgl_lahir);
         $('#edit_jenis_kelamin').html(data.output_jenis_kelamin);
         $('#edit_no_kk').val(data.data.no_kk);
         $('#edit_nik_balita').val(data.data.nik_balita);
         $('#edit_bb_lahir').val(data.data.bb_lahir);
         $('#edit_tb_lahir').val(data.data.tb_lahir);
         $('#edit_kia').html(data.output_kia);
         $('#edit_imd').html(data.output_imd);
         $('#edit_nama_ortu').val(data.data.nama_ortu);
         $('#edit_nik_ortu').val(data.data.nik_ortu);
         $('#edit_no_hp').val(data.data.no_hp);
         $('#edit_alamat').val(data.data.alamat);
         $('#edit_rt').val(data.data.rt);
         $('#edit_rw').val(data.data.rw);
     })
});
</script>

@endsection