<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('app')
>>>>>>> 21962ee215f340f84c04ed1522f0eed04c616b60

@section('content')
<div class="row">
    <div class="col-md-4">
        <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Default</button>
        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
              
              <div class="modal-header">
                  <h6 class="modal-title text-align-center" id="modal-title-default">Masukkan Jadwal Pelayanan</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              
              <div class="modal-body">
                  
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                  
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
              </div>
              
          </div>
      </div>
  </div>
  
  @endsection  