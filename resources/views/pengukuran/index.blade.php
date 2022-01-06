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
              <li class="breadcrumb-item"><a href="#">Pengukuran</a></li>
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
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Data Pengukuran</h3>
               
               <!-- <form class="form" method="get" action="{{ route('search') }}">
                <div class="form-group w-100 mb-3 mt-2">
                  <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan nama balita">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
              </form> -->
            </div>
            <div class="col-4 text-right">
                <a href="pengukuran/exportpdf" class="btn btn-light btn-sm" data-placement="left" title="Download Data Pengukuran PDF">PDF</a>
                <a href="pengukuran/export-excel" class="btn btn-light btn-sm" data-placement="left" title="Download Data Pengukuran Excel">Excel</a>
                <a href="pengukuran/export-csv" class="btn btn-light btn-sm" data-placement="left" title="Download Data Pengukuran CSV">CSV</a>
                <button id="#btn-add" data-target="#modal-pengukuran-create" class="btn-add btn btn-primary btn-sm" data-toggle="modal" data-placement="left" title="Tambah Data Pengukuran"><i class="bi bi-plus-circle"></i></button>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="no">No</th>
                <th scope="col" class="sort" data-sort="tgl_pelayanan">Tanggal Pengukuran</th>
                <th scope="col" class="sort" data-sort="nama_balita">Nama Balita</th>
                <th scope="col" class="sort" data-sort="usia">Usia</th>
                <th scope="col" class="sort" data-sort="bb">Berat Badan</th>
                <th scope="col" class="sort" data-sort="tb">Tinggi Badan</th>
                <th scope="col" class="sort" data-sort="cara_ukur">Cara Ukur</th>
                <th scope="col" class="sort" data-sort="vitamin_a">Vitamin A</th>
                <th scope="col" class="sort" data-sort="asi">Asi</th>
                <th scope="col" class="sort" data-sort="pmt_ke">PMT Ke-</th>
                <th scope="col" class="sort" data-sort="sumber_pmt">Sumber PMT</th>
                <th scope="col" class="sort" data-sort="tgl_pemberian">Tanggal PMT</th>
                <th scope="col" class="sort" data-sort="aksi">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($pengukuran as $key => $item)
              <tr>
                <th scope="row">{{ $key + $pengukuran->firstItem()}}</th>
                <td>{{date('d F Y',strtotime($item->jadwal->tgl_pelayanan))}}</td>
                <td>{{$item->balita->nama_balita}}</td>
                <td>{{$item->usia}}</td>
                <td>{{$item->bb}}</td>
                <td>{{$item->tb}}</td>
                <td>{{$item->cara_ukur}}</td>
                <td>{{$item->vitamin_a}}</td>
                <td>{{$item->asi}}</td>
                <td>{{$item->pmt_ke}}</td>
                <td>{{$item->sumber_pmt}}</td>
                <td>{{$item->tgl_pemberian}}</td>
                <td>
                  @csrf
                  <a href="/pengukuran/{{$item->id}}/delete" onclick="return sweetDel(event)"
                      class="btn btn-danger"><i class="bi bi-trash"></i></a>
                  <button id="#btn-edit" data-target="#modal-pengukuran-edit" class="btn-edit btn btn-primary" data-toggle="modal" data-placement="left" value="{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
      <div class="card-footer py-4">
        {{ $pengukuran->links() }}
      </div>
    </div>
  </div>
</div>

@include('pengukuran.modalCreate');
@include('pengukuran.modalEdit');

<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script>
$('.btn-edit').click(function(e) {
    e.preventDefault();
    var id = $(this).val();
    $.get('pengukuran/' + id + '/edit', function (data) {
         $('#edit_id').val(id);
         $('#edit_usia').val(data.data.usia);
         $('#edit_bb').val(data.data.bb);
         $('#edit_tb').val(data.data.tb);
         $('#edit_cara_ukur').html(data.output_cara_ukur);
         $('#edit_vitamin_a').html(data.output_vitamin);
         $('#edit_asi').html(data.output_asi);
         $('#edit_pmt_ke').val(data.data.pmt_ke);
         $('#edit_balita_id').html(data.output_nama_balita);
         $('#edit_sumber_pmt').html(data.output_sumber_pmt);
         $('#edit_tgl_pemberian').val(data.data.tgl_pemberian);
         $('#edit_tgl_pelayanan').html(data.output_tgl_pelayanan);
     })
});
</script>

@endsection