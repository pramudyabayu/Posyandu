<!-- MODAL JADWAL EDIT-->
<div class="modal fade" id="modal-jadwal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Edit Data Jadwal</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-12 section">
            <div class="line mb-5"></div>
            <form action="/jadwal/update" method="POST">
              @csrf
              <div class="mb-3">
                <label for="tgl_pelayanan" class="form-control-label">Tanggal</label>
                <input autocomplete="off" type="date" class="form-control @error('tgl_pelayanan') is-invalid @enderror" name="tgl_pelayanan"  id="edit_tgl_pelayanan" value="{{ old('tgl_pelayanan') }}">
                  @error('tgl_pelayanan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="jam_pelayanan" class="form-control-label">Waktu</label>
                <input autocomplete="off" type="time" class="form-control @error('jam_pelayanan') is-invalid @enderror" name="jam_pelayanan"  id="edit_jam_pelayanan" value="{{ old('jam_pelayanan') }}">
                  @error('jam_pelayanan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="tempat_pelayanan" class="form-control-label">Tempat</label>
                <input autocomplete="off" type="text" class="form-control @error('tempat_pelayanan') is-invalid @enderror" name="tempat_pelayanan"  id="edit_tempat_pelayanan" value="{{ old('tempat_pelayanan') }}">
                  @error('tempat_pelayanan')
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
  