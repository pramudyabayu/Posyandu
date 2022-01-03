<!-- <MODAL IMUNISASI> --> 
<div class="modal fade" id="modal-imunisasi-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-default">Edit Data Imunisasi</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form actioin="/imunisasi/update" method="POST">
        @csrf
      <div class="modal-body">
        <div class="col-12 section">
          <div class="line mb-5"></div>
            <div class="mb-3">
                  <label for="tgl_imunisasi" class="form-control-label">Tanggal Imunisasi</label>
                  <input autocomplete="off" type="date" class="form-control @error('tgl_imunisasi') is-invalid @enderror" name="tgl_imunisasi"  id="edit_tgl_imunisasi" value="{{ old('tgl_imunisasi') }}">
                  @error('tgl_imunisasi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
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
              <label for="inlineFormCustomSelect" class="form-control-label">Jenis Imunisasi</label>
              <select name="jenis_imunisasi" class="custom-select mr-sm-2 @error('jenis_imunisasi') is-invalid @enderror" id="edit_jenis_imunisasi">
                <option selected>0-7 Hari (HB 0)</option>
                <option>1 Bulan (BCG, Polio 1)</option>
                <option>2 Bulan (DPT-HB-Hib 1, Polio 2)</option>
                <option>3 Bulan (DPT-HB-Hib 2, Polio 3)</option>
                <option>4 Bulan (DPT-HB-Hib 3, Polio 4, IPV)</option>
                <option>9 Bulan (Campak)</option>
                <option>18 Bulan (DPT-HB-Hib)</option>
                <option>24 Bulan (Campak)</option>  
              </select>
                @error('jenis_imunisasi')
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
<!-- </div>
</div> -->


