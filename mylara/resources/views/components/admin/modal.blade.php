<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 w-100 text-center" >{{$title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     {{ $slot }}
      </div>
      
    </div>
  </div>
</div>