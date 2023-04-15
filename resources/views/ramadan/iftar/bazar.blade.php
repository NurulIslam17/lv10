@extends('dashboard.master')
@section('main')
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-body">
                <div class=" d-flex justify-content-between">
                    <div>
                        <h2>Bazar</h2>
                    </div>
                    <div>
                        <a href="{{ route('bazar.create') }}" class="btn btn-success text-light">
                            Create
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">SL</th>
                                <th scope="col" class="text-center">Ramadan</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Amount</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bazars as $bazar)
                                <tr>
                                    <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                    <td scope="col" class="text-center">Ramadan {{ $bazar->ramadan }}</td>
                                    <td scope="col" class="text-center">{{ $bazar->name }}</td>
                                    <td scope="col" class="text-center">{{ $bazar->amount }} BDT</td>
                                    <td scope="col" class="text-center">
                                        <a class="btn btn-sm btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Bazar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nurul</td>
                                <td>{{ $t_nurul }}</td>
                                <td>{{ $nurul }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mizan</td>
                                <td>{{ $t_mizan }}</td>
                                <td>{{ $mizan }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Afik</td>
                                <td>{{ $t_afik }}</td>
                                <td>{{ $afik }}</td>
                            </tr>
                        </tbody>

                    </table>
                    <p>Iftar Cost : {{ $iftar_cost }}</p>
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
