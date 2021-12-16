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
            
                <!-- Card header -->
                <div class="card">
                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col-8">
                          <h3 class="mb-0">Data Pengukuran</h3>
                        </div>
                        <div class="col-4 text-right">
                        <a href="#modal-pengukuran" class="btn btn-sm btn-primary bi bi-plus-circle" data-toggle="modal" data-placement="left" title="Tambah Data Pengukuran"></a>
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
                                <td>{{$item->jadwal->tgl_pelayanan}}</td>
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
                                <td><form action="/balita/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
                                </form>
                                <a href="/pengukuran/{{$item->id}}/edit" class="btn btn-primary" ><i class="bi bi-pencil-square"></i></a> 
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

      <div class="modal fade" id="modal-pengukuran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Tambah Data Balita</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
          </div>
         <div class="modal-body">
           <div class="col-12 section">
             <div class="line mb-5"></div>
              <form action="/balita" method="POST">
              @csrf
              <div class="col-12 d-flex form-container mb-5">
                <div class="col-6 left-form">
                  <div class="mb-3">
                    <label for="inlineFormCustomSelect" class="form-control-label">Tanggal Pengukuran</label>
                      <select name="jadwal_id" class="custom-select mr-sm-2 @error('jadwal_id') is-invalid @enderror" id="inlineFormCustomSelect">
                      @foreach ($jadwal as $option)
                          <option value="{{$option->id ?? null}}">{{$option->tgl_pelayanan ?? null}}</option>
                      @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="inlineFormCustomSelect" class="form-control-label">Nama Balita</label>
                      <select name="balita_id" class="custom-select mr-sm-2 @error('balita_id') is-invalid @enderror" id="inlineFormCustomSelect">
                          @foreach ($balita as $option)
                              <option value="{{$option->id ?? null}}">{{$option->nama_balita ?? null}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="usia" class="form-control-label">Usia Balita (bulan)</label>
                    <input autocomplete="off" type="number" class="form-control @error('usia') is-invalid @enderror" name="usia"  id="usia" value="{{ old('usia') }}">
                    @error('usia')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="bb" class="form-control-label">BB (Kg)</label>
                    <input autocomplete="off" type="number" class="form-control @error('bb') is-invalid @enderror" name="bb"  id="bb" value="{{ old('bb') }}">
                    @error('bb')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tb" class="form-control-label">TB (Cm)</label>
                    <input autocomplete="off" type="number" class="form-control @error('tb') is-invalid @enderror" name="tb"  id="tb" value="{{ old('tb') }}">
                    @error('tb')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3"> 
                    <label for="cara_ukur" class="form-control-label">Cara Ukur</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="cara_ukur" value="Berdiri" id="Berdiri">
                        <label class="form-check-label" for="Berdiri">Berdiri</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="cara_ukur" value="Terlentang" id="Terlentang">
                        <label class="form-check-label" for="Terlentang">Terlentang</label>
                    </div>
                  </div>
                </div>
                <div class="col-6 right-form">
                  <div class="mb-5">
                    <label for="vitamin_a" class="form-control-label">Vitamin A</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="vitamin_a" value="Ya" id="vitamin_a_1">
                        <label class="form-check-label" for="vitamin_a_1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="vitamin_a" value="Tidak" id="vitamin_a_2">
                        <label class="form-check-label" for="vitamin_a_2">Tidak</label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="asi" class="form-control-label">Asi</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="asi" value="Ya" id="asi1">
                        <label class="form-check-label" for="asi1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="asi" value="Tidak" id="asi2">
                        <label class="form-check-label" for="asi2">Tidak</label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="pmt_ke" class="form-control-label">PMT Ke-</label>
                    <input autocomplete="off" type="number" class="form-control @error('pmt_ke') is-invalid @enderror" name="pmt_ke"  id="pmt_ke" value="{{ old('pmt_ke') }}">
                    @error('pmt_ke')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="Sumber_pmt" class="form-control-label">Sumber PMT</label>
                    <select name="sumber_pmt" class="custom-select mr-sm-2 @error('sumber_pmt') is-invalid @enderror" id="inlineFormCustomSelect">
                      <option selected>-</option>
                      <option>swadaya</option>
                      <option>Daerah</option>
                      <option>Pusat</option> 
                    </select>
                    @error('sumber_pmt')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tgl_pemberian" class="form-control-label">Tanggal PMT</label>
                    <input autocomplete="off" type="date" class="form-control @error('tgl_pemberian') is-invalid @enderror" name="tgl_pemberian"  id="tgl_pemberian" value="{{ old('tgl_pemberian') }}">
                    @error('tgl_pemberian')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
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
