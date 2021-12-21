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
              <li class="breadcrumb-item"><a href="#">Kader</a></li>
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
              <h3 class="mb-0">Kader Posyandu</h3>
            </div>
            <div class="col-4 text-right">
              <a href="#modal-kader" class="btn btn-sm btn-primary bi bi-plus-circle" data-toggle="modal" data-placement="left" title="Tambah Data Kader"></a>
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
                  <form action="/kader/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
                  </form>
                  <a href="#modal-kader-edit" class="btn btn-primary" data-toggle="modal" data-placement="left" ><i class="bi bi-pencil-square"></i></a>
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
</div>


<!-- <MODAL KADER> -->
<div class="modal fade" id="modal-kader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-default">Tambah Data Kader</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 section">
          <div class="line mb-5"></div>
            <form action="/kader" method="POST">
              @csrf
              <div class="mb-3">
                <label for="nama_kader" class="form-control-label">Nama</label>
                <input autocomplete="off" type="text" class="form-control @error('nama_kader') is-invalid @enderror" name="nama_kader"  id="nama_kader" value="{{ old('nama_kader') }}">
                @error('nama_kader')
                  <div class="invalid-feedback">
                  {{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="no_hp_kader" class="form-control-label">No HP</label>
                <input autocomplete="off" type="number" class="form-control @error('no_hp_kader') is-invalid @enderror" name="no_hp_kader"  id="no_hp_kader" value="{{ old('no_hp_kader') }}">
                @error('no_hp_kader')
                  <div class="invalid-feedback">
                  {{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="alamat_kader" class="form-control-label">Alamat</label>
                <textarea autocomplete="off" type="text" class="form-control @error('alamat_kader') is-invalid @enderror" name="alamat_kader"  id="alamat_kader" value="{{ old('alamat_kader') }}"></textarea>
                @error('alamat_kader')
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
        </form>
      </div>
    </div>
  </div>
</div>

<!-- <MODAL KADER EDIT> -->
<div class="modal fade" id="modal-kader-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-default">Edit Data Kader</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 section">
          <div class="line mb-5"></div>
          <form action="/kader/{{$item->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
              <label for="nama_kader" class="form-control-label">Nama</label>
              <input autocomplete="off" type="text" class="form-control @error('nama_kader') is-invalid @enderror" name="nama_kader"  id="nama_kader" value="{{ old('nama_kader') }}">
              @error('nama_kader')
                <div class="invalid-feedback">
                {{$message}}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="no_hp_kader" class="form-control-label">No HP</label>
              <input autocomplete="off" type="number" class="form-control @error('no_hp_kader') is-invalid @enderror" name="no_hp_kader"  id="no_hp_kader" value="{{ old('no_hp_kader') }}">
              @error('no_hp_kader')
                <div class="invalid-feedback">
                {{$message}}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="alamat_kader" class="form-control-label">Alamat</label>
              <textarea autocomplete="off" type="text" class="form-control @error('alamat_kader') is-invalid @enderror" name="alamat_kader"  id="alamat_kader" value="{{ old('alamat_kader') }}"></textarea>
              @error('alamat_kader')
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