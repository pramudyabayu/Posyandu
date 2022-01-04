<!-- <MODAL BALITA> -->
    <div class="modal fade" id="modal-balita-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="nama_balita" class="form-control-label">Nama Balita</label>
                        <input autocomplete="off" type="text" class="form-control @error('nama_balita') is-invalid @enderror" name="nama_balita"  id="nama_balita" value="{{ old('nama_balita') }}">
                          @error('nama_balita')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="anak_ke" class="form-control-label">Anak Ke-</label>
                        <input autocomplete="off" type="number" class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke"  id="anak_ke" value="{{ old('anak_ke') }}">
                          @error('anak_ke')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                        <input autocomplete="off" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"  id="tgl_lahir" value="{{ old('tgl_lahir') }}">
                          @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="jenis_kelamin" class="form-control-label">Jenis</label><br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input"type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin_laki">
                          <label class="form-check-label" for="jenis_kelamin_laki">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input"type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin_perempuan">
                          <label class="form-check-label" for="jenis_kelamin_perempuan">Perempuan</label>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="no_kk" class="form-control-label">No KK</label>
                        <input autocomplete="off" type="number" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"  id="no_kk" value="{{ old('no_kk') }}">
                          @error('no_kk')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nik_balita" class="form-control-label">NIK Balita</label>
                        <input autocomplete="off" type="number" class="form-control @error('nik_balita') is-invalid @enderror" name="nik_balita"  id="nik_balita" value="{{ old('nik_balita') }}">
                          @error('nik_balita')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="bb_lahir" class="form-control-label">Berat Badan Lahir</label>
                        <input autocomplete="off" type="number" class="form-control @error('bb_lahir') is-invalid @enderror" name="bb_lahir"  id="bb_lahir" value="{{ old('bb_lahir') }}">
                          @error('bb_lahir')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="tb_lahir" class="form-control-label">Tinggi Badan Lahir</label>
                        <input autocomplete="off" type="number" class="form-control @error('tb_lahir') is-invalid @enderror" name="tb_lahir"  id="tb_lahir" value="{{ old('tb_lahir') }}">
                          @error('tb_lahir')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                    </div>
                    <div class="col-6 right-form">
                      <div class="mb-4">
                        <label for="kia" class="form-control-label">KIA (Kesehatan Ibu dan Anak)</label>
                        <div class="d-flex">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="kia" id="kia1" value="Ya">
                            <label class="form-check-label" for="kia1">Ya</label>
                          </div>
                          <div class="form-check mx-3">
                            <input class="form-check-input" type="radio" name="kia" value="Tidak" id="kia2">
                            <label class="form-check-label" for="kia2">Tidak</label>
                          </div>
                        </div>
                          @error('kia')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="imd" class="form-control-label">IMD (Inisiasi Menyusu Dini)</label>
                        <div class="d-flex">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="imd" id="imd1" value="Ya">
                            <label class="form-check-label" for="imd1">Ya</label>
                          </div>
                          <div class="form-check mx-3">
                            <input class="form-check-input" type="radio" name="imd" value="Tidak" id="imd2">
                            <label class="form-check-label" for="imd2">Tidak</label>
                          </div>
                        </div>
                          @error('imd')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nama_ortu" class="form-control-label">Nama Ortu</label>
                        <input autocomplete="off" type="text" class="form-control @error('nama_ortu') is-invalid @enderror" name="nama_ortu"  id="nama_ortu" value="{{ old('nama_ortu') }}">
                          @error('nama_ortu')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nik_ortu" class="form-control-label">NIK Ortu</label>
                        <input autocomplete="off" type="number" class="form-control @error('nik_ortu') is-invalid @enderror" name="nik_ortu"  id="nik_ortu" value="{{ old('nik_ortu') }}">
                          @error('nik_ortu')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="no_hp" class="form-control-label">No HP</label>
                        <input autocomplete="off" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"  id="no_hp" value="{{ old('no_hp') }}">
                          @error('no_hp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="alamat" class="form-control-label">Alamat</label>
                        <textarea autocomplete="off" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  id="alamat" value="{{ old('alamat') }}"></textarea>
                          @error('alamat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="rt" class="form-control-label">RT</label>
                        <input autocomplete="off" type="number" class="form-control @error('rt') is-invalid @enderror" name="rt"  id="rt" value="{{ old('rt') }}">
                          @error('rt')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="rw" class="form-control-label">RW</label>
                        <input autocomplete="off" type="number" class="form-control @error('rw') is-invalid @enderror" name="rw"  id="rw" value="{{ old('rw') }}">
                          @error('rw')
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
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>