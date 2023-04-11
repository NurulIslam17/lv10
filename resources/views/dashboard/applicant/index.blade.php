@extends('dashboard.master')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
@endpush
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
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Create
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
                                <th scope="col" class="text-center">Image</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Division</th>
                                <th scope="col" class="text-center">District</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Phone</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                    <td scope="col" class="text-center">
                                        @if ($item->image)
                                            <img class="rounded-circle" src="{{ asset('applicant/' . $item->image) }}"
                                                style="height:40px;width:40px;" alt="" srcset="">
                                        @else
                                            <img class="rounded-circle"
                                                src="{{ asset('dash_board/assets/images/clients/6.png') }}"
                                                style="height:40px;width:40px;" alt="" srcset="">
                                        @endif
                                    </td>
                                    <td scope="col" class="text-center">{{ $item->name }}</td>
                                    <td scope="col" class="text-center">{{ $item->division->name }}</td>
                                    <td scope="col" class="text-center">{{ $item->district->name }}</td>
                                    <td scope="col" class="text-center">{{ $item->email }}</td>
                                    <td scope="col" class="text-center">{{ $item->phone }}</td>
                                    <td scope="col" class="text-center">
                                        <a type="button" class="btn btn-sm btn-success text-light" data-toggle="modal"
                                            data-target="#edit-{{ $item->id }}">
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
    @include('dashboard.applicant.modal.edit')
@endsection

@push('js')
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('#myTable').dataTable();
    </script>
    <script>
        $('.dropify').dropify();
    </script>

    <script>
        $(document).ready(function() {
            $("#division").on('change', function(e) {
                e.preventDefault();
                let _divisionId = $(this).val();
                let url = "{{ route('applicants.get.districts.for.division', ':divisionId') }}";
                url = url.replace(":divisionId", _divisionId);
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    success: function(response) {
                        $("#district").html(
                            `<option selected disabled>Choose districts...</option>`);
                        console.log(response);
                        $.each(response, function(key, value) {
                            $("#district").append(
                                `<option value="${value.id}">${value.name}</option>`
                            );
                        });
                    }
                });
            });
        });
    </script>
@endpush
