<!--Edit Modal -->
@foreach ($divisions as $division)
    <div class="modal fade" id="editDivision-{{ $division->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">About {{ $division->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Name In English : </strong><span class="m-5">{{ $division->name }}</span>
                                </p>
                                <p><strong>Name In Bangla : </strong><span
                                        class="m-5">{{ $division->bn_name }}</span>
                                </p>
                                <p><strong>Visit Website : </strong><a target="_blank" href="{{ $division->url }}"
                                        class="m-5">{{ $division->url }}</a>
                                </p>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
