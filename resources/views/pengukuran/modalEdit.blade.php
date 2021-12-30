<!-- <MODAL PENGUKURAN> --> 
<div class="modal fade" id="modal-pengukuran-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-default">Edit Data Pengukuran</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12 section">
          <div class="line mb-5"></div>
          <form action="/pengukuran/update" method="POST">
            @csrf
            <div class="col-12 d-flex form-container mb-5">
              <div class="col-6 left-form">
                <div class="mb-3">
                  <label for="inlineFormCustomSelect" class="form-control-label">Tanggal Pengukuran</label>
                  <select name="jadwal_id" class="custom-select mr-sm-2 @error('jadwal_id') is-invalid @enderror" id="edit_tgl_pelayanan">
                      @foreach ($jadwal as $option)
                      <option value="{{$option->id ?? null}}">{{$option->tgl_pelayanan ?? null}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="inlineFormCustomSelect" class="form-control-label">Nama Balita</label>
                  <select name="balita_id" class="custom-select mr-sm-2 @error('balita_id') is-invalid @enderror" id="edit_balita_id">
                      @foreach ($balita as $option)
                        <option value="{{$option->id ?? null}}">{{$option->nama_balita ?? null}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="usia" class="form-control-label">Usia Balita (bulan)</label>
                  <input autocomplete="off" type="number" class="form-control @error('usia') is-invalid @enderror" name="usia"  id="edit_usia" value="{{ old('usia') }}">
                    @error('usia')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                <div class="mb-3">
                  <label for="bb" class="form-control-label">BB (Kg)</label>
                  <input autocomplete="off" type="number" class="form-control @error('bb') is-invalid @enderror" name="bb"  id="edit_bb" value="{{ old('bb') }}">
                  @error('bb')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="tb" class="form-control-label">TB (Cm)</label>
                  <input autocomplete="off" type="number" class="form-control @error('tb') is-invalid @enderror" name="tb"  id="edit_tb" value="{{ old('tb') }}">
                  @error('tb')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="cara_ukur" class="form-control-label">Cara Ukur</label><br>
                  <div id="edit_cara_ukur">
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
              </div>
              <div class="col-6 right-form">
                <div class="mb-5">
                  <label for="vitamin_a" class="form-control-label">Vitamin A</label><br>
                  <div id="edit_vitamin_a">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="vitamin_a" value="Ya" id="vitamin_a_1">
                        <label class="form-check-label" for="vitamin_a_1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="vitamin_a" value="Tidak" id="vitamin_a_2">
                        <label class="form-check-label" for="vitamin_a_2">Tidak</label>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-control-label">Asi</label><br>
                  <div id="edit_asi">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="asi" value="Ya" id="asi1">
                        <label class="form-check-label" for="asi1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"type="radio" name="asi" value="Tidak" id="asi2">
                        <label class="form-check-label" for="asi2">Tidak</label>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="pmt_ke" class="form-control-label">PMT Ke-</label>
                  <input autocomplete="off" type="number" class="form-control @error('pmt_ke') is-invalid @enderror" name="pmt_ke"  id="edit_pmt_ke" value="{{ old('pmt_ke') }}">
                  @error('pmt_ke')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="Sumber_pmt" class="form-control-label">Sumber PMT</label>
                  <select name="sumber_pmt" class="custom-select mr-sm-2 @error('sumber_pmt') is-invalid @enderror" id="edit_sumber_pmt">
                    <option selected>-</option>
                    <option>Swadaya</option>
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
                  <input autocomplete="off" type="date" class="form-control @error('tgl_pemberian') is-invalid @enderror" name="tgl_pemberian"  id="edit_tgl_pemberian" value="{{ old('tgl_pemberian') }}">
                  @error('tgl_pemberian')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
                <input type="hidden" name="id" id="edit_id" />
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
</div>