<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" name="name" class="form-control" required id="name">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="division">Division</label>
                                        <select id="division" name="division_id" onchange="getDistrictData(this.value)"
                                            required class="form-control">
                                            <option selected disabled>Choose...</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <select id="district" name="district_id" required class="form-control">
                                            <option selected disabled>Choose...</option>
                                            <option value="1">District 1</option>
                                            <option value="2">District 2</option>
                                            <option value="3">District 3</option>
                                            <option value="4">District 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" name="email" required class="form-control"
                                            id="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" required class="form-control"
                                            id="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" class="dropify" required data-height="120" name="image"
                                    id="image">
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
