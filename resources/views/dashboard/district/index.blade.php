@extends('dashboard.master')
@section('main')
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-body">
                <div class=" d-flex justify-content-between">
                    <div>
                        <h2>District</h2>
                    </div>
                    <div>
                        {{-- <a class="btn btn-success text-light">
                        </a> --}}
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
                                <th scope="col" class="text-center">Bangla</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($items as $item)
                                <tr>
                                    <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                    <td scope="col" class="text-center">{{ $item->name }}</td>
                                    <td scope="col" class="text-center">{{ $item->bn_name }}</td>
                                    <td scope="col" class="text-center">
                                        <a class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#show_district-{{ $item->id }}">
                                            <i class="fa fa-eye text-light"></i> Show
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

    <!-- Modal -->
    @foreach ($items as $item)
        <div class="modal fade" id="show_district-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">About {{ $item->name }} District</h5>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
                            X</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name : </strong>{{ $item->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Bangla : </strong>{{ $item->bn_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Longitude : </strong>{{ $item->lon }} <sup>0</sup></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Latitude : </strong>{{ $item->lat }} <sup>0</sup></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p><strong>Visit here : </strong><a href="{{ $item->url }}"
                                        target="_blank">{{ $item->url }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $('#myTable').dataTable();
    </script>
@endpush
