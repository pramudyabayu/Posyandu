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
            <div class="card">
            
                <!-- Card header -->
                <div class="card">
                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col-8">
                          <h3 class="mb-0">Jadwal Pelayanan</h3>
                        </div>
                        <div class="col-4 text-right">
                          <a href="#modal-jadwal" class="btn btn-sm btn-primary bi bi-plus-circle" data-toggle="modal" data-placement="left" title="Tambah Jadwal Pelayanan"></a>
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
                        <form action="/jadwal/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="/jadwal/{{$item->id}}/edit" class="btn btn-primary" ><i class="bi bi-pencil-square"></i></a>
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
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
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

        <div class="modal fade" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Tambah Data Jadwal</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
          </div>
         <div class="modal-body">
           <div class="col-12 section">
             <div class="line mb-5"></div>
              <form action="/jadwal" method="POST">
              @csrf
                  <div class="mb-3">
                    <label for="tgl_pelayanan" class="form-control-label">Tanggal</label>
                    <input autocomplete="off" type="date" class="form-control @error('tgl_pelayanan') is-invalid @enderror" name="tgl_pelayanan"  id="tgl_pelayanan" value="{{ old('tgl_pelayanan') }}">
                    @error('tgl_pelayanan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="jam_pelayanan" class="form-control-label">Waktu</label>
                    <input autocomplete="off" type="time" class="form-control @error('jam_pelayanan') is-invalid @enderror" name="jam_pelayanan"  id="jam_pelayanan" value="{{ old('jam_pelayanan') }}">
                    @error('jam_pelayanan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tempat_pelayanan" class="form-control-label">Tempat</label>
                    <input autocomplete="off" type="text" class="form-control @error('tempat_pelayanan') is-invalid @enderror" name="tempat_pelayanan"  id="tempat_pelayanan" value="{{ old('tempat_pelayanan') }}">
                    @error('tempat_pelayanan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                  
                </div>
            </div>

          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              
          </div>
         </div>
      </div>
  </div>
</div>
@endsection