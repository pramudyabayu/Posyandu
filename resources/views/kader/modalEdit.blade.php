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
            <form action="/kader/update" method="POST">
              @csrf
              <div class="mb-3">
                <label for="nama_kader" class="form-control-label">Nama</label>
                <input autocomplete="off" type="text" class="form-control @error('nama_kader') is-invalid @enderror" name="nama_kader"  id="edit_nama_kader" value="{{ old('nama_kader') }}">
                @error('nama_kader')
                  <div class="invalid-feedback">
                  {{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="no_hp_kader" class="form-control-label">No HP</label>
                <input autocomplete="off" type="number" class="form-control @error('no_hp_kader') is-invalid @enderror" name="no_hp_kader"  id="edit_no_hp_kader" value="{{ old('no_hp_kader') }}">
                @error('no_hp_kader')
                  <div class="invalid-feedback">
                  {{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="alamat_kader" class="form-control-label">Alamat</label>
                <textarea autocomplete="off" type="text" class="form-control @error('alamat_kader') is-invalid @enderror" name="alamat_kader"  id="edit_alamat_kader" value="{{ old('alamat_kader') }}"></textarea>
                @error('alamat_kader')
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