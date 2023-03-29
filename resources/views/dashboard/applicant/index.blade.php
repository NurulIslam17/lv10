@extends('dashboard.master')
@section('main')
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-body">
                <div class=" d-flex justify-content-between">
                    <div>
                        <h2>Applicant</h2>
                        <p>{{ Session::get('msg') }}</p>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success text-light" data-toggle="modal" data-target="#addModal">
                            <i class="fa fa-plus"></i> Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">SL</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Phone</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                    <td scope="col" class="text-center">{{ $item->name }}</td>
                                    <td scope="col" class="text-center">{{ $item->email }}</td>
                                    <td scope="col" class="text-center">{{ $item->phone }}</td>
                                    <td scope="col" class="text-center">
                                        <a type="button" class="btn btn-sm btn-success text-light" data-toggle="modal"
                                            data-target="#editModal">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger text-light">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>


    <!-- Add Modal -->
    @include('dashboard.applicant.modal.create')
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Applicant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $('#myTable').dataTable();
    </script>
@endpush
