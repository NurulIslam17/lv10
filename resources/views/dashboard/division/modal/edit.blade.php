<!--Edit Modal -->
@foreach ($divisions as $division)
    <div class="modal fade" id="editDivision-{{ $division->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Division</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('division.update', ['division' => $division->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Division</label>
                            <input type="text" name="name" value="{{ $division->name }}" class="form-control"
                                id="name">
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $division->email }}"
                                        class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="zip">Zip</label>
                                    <input type="text" name="zip" value="{{ $division->zip }}"
                                        class="form-control" id="zip">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach
