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
                    <li class="breadcrumb-item"><a href="#">Pemasukan</a></li>
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
                          <h3 class="mb-0">Pemasukan</h3>
                        </div>
                        <div class="col-4 text-right">
                          <a href="/kader/create" class="btn btn-sm btn-primary bi bi-plus-circle" data-toggle="tooltip" data-placement="left" title="Tambah Nama Kader"></a>
                        </div>
                      </div>
                    </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="tanggal">Tanggal</th>
                      <th scope="col" class="sort" data-sort="catatan">Catatan</th>
                      <th scope="col" class="sort" data-sort="pemasuka">Pemasukan</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($keuangan as $item)
                    <tr>
                    <th scope="row">{{$i++}}</th>
                        <td>{{$item->tanggal}}</td>
                        <td>{{$item->catatan}}</td>
                        <td>{{$item->pemasukan}}</td>
                        <td>
                        <form action="/keuangan/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="/keuangan/{{$item->id}}/edit" class="btn btn-primary" ><i class="bi bi-pencil-square"></i></a>
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