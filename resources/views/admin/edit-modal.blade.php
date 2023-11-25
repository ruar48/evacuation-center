<div id="editModal" class="modal animated rubberBand edit-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa fa-edit" style="font-size: 50px;"></i>
                <h3>Are you sure you want to edit this Calamity type?</h3>
                <div class="modal-body">
                    @foreach ($calamity as $row)
                        <form method="post" action="{{ route('admin.update', ['id' => $row->id]) }}">

                            @csrf

                            <div class="mb-3">
                                {{-- <label for="country" class="form-label">Country</label> --}}
                                <input type="text" class="form-control" id="calamity-id" name="id"
                                    value="{{ $row->id }}">
                    @endforeach
                    <input type="text" class="form-control" id="calamity-type" name="calamity_name">
                    <!-- Placeholder for Calamity Name -->
                </div>
                <div class="mb-3" id="created-at-element">
                    <!-- Placeholder for Created at -->
                </div>
                <div class="mb-3" id="updated-at-element">
                    <!-- Placeholder for Last update at -->
                </div>
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
