@extends('dashboard.master')
@section('main')
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-body">
                <div class=" d-flex justify-content-between">
                    <div>
                        <h2>Sehari</h2>
                        <p class="text-success">{{ Session::get('msg') }}</p>
                    </div>
                    <div>
                        <a href="{{ route('sehari.report') }}" class="btn btn-success text-light">
                            Report
                        </a>
                        <a href="{{ route('sehari.bazar.list') }}" class="btn btn-success text-light">
                            Bazar
                        </a>
                        <a href="{{ route('crate.sehari') }}" class="btn btn-primary text-light">
                            Crate
                        </a>
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
                                <th scope="col" class="text-center">Ramadan</th>
                                <th scope="col" class="text-center">Nurul</th>
                                <th scope="col" class="text-center">Mizan</th>
                                <th scope="col" class="text-center">Afik</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sehari as $val)
                                <tr>
                                    <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                    <td scope="col" class="text-center">Ramadan {{ $val->ramadan }}</td>
                                    <td scope="col" class="text-center">{{ $val->nurul }}</td>
                                    <td scope="col" class="text-center">{{ $val->mizan }}</td>
                                    <td scope="col" class="text-center">{{ $val->afik }}</td>
                                    <td scope="col" class="text-center">
                                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@push('js')
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $('#myTable').dataTable();
    </script>
@endpush
