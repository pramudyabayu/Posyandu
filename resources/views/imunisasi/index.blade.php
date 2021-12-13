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
            <div class="card">
            
                <!-- Card header -->
                <div class="card">
                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col-8">
                          <h3 class="mb-0">Data Imunisasi</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="/balita/create" class="btn btn-sm btn-primary bi bi-plus-circle" data-toggle="tooltip" data-placement="left" title="Tambah Data Balita"></a>
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
                                <td><form action="/balita/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
                                </form>
                                <a href="/imunisasi/{{$item->id}}/edit" class="btn btn-primary" ><i class="bi bi-pencil-square"></i></a> 
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
@endsection