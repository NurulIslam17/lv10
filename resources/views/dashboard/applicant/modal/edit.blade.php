@foreach ($items as $item)
    <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Applicant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card shadow border">
                        <div class="card-body">
                            <form action="{{ route('applicants.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $item->name }}"
                                        class="form-control" required id="name">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="division">Division</label>
                                            <select id="division" name="division_id" onchange="getDistrict(this)"
                                                required class="form-control">
                                                <option selected disabled>Choose...</option>
                                                @foreach ($divisions as $division)
                                                    <option {{ $division->id == $item->division_id ? 'selected' : '' }}
                                                        value="{{ $division->id }}">{{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="district">District</label>
                                            <select id="district" name="district_id" required class="form-control">
                                                <option selected disabled>Choose...</option>
                                                {{-- @foreach ($districts as $district)
                                                    @if ($district->id == $item->district_id)
                                                        <option value="">$district->name</option>
                                                    @else
                                                        <option value=""></option>
                                                    @endif
                                                @endforeach --}}
                                                {{-- <option value="1">Dhaka</option>
                                                <option value="3">Rangpur</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" value="{{ $item->email }}" name="email" required
                                                class="form-control" id="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" value="{{ $item->phone }}" name="phone" required
                                                class="form-control" id="phone">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="dropify" data-height="90" type="file" name="image"
                                            id="image">
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ asset('applicant/' . $item->image) }}"
                                            style="height:100px;width:100%;" alt="">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach

@push('js')
    <script>
        function getDistrict(e) {
            let districtDivContainer = e.parentElement.parentElement.parentElement;
            let districtDiv = districtDivContainer.children[1].children[0].children[1];
            let _divisionId = e.value;
            let url = "{{ route('applicants.get.districts.for.division', ':divisionId') }}";
            url = url.replace(":divisionId", _divisionId);
            $.ajax({
                url: url,
                type: "GET",
                cache: false,
                success: function(response) {
                    $(districtDiv).html(
                        `<option selected disabled>Choose districts...</option>`);
                    $.each(response, function(key, value) {
                        $(districtDiv).append(
                            `<option value="${value.id}">${value.name}</option>`
                        );
                    });
                }
            });
        }
    </script>
@endpush
