@extends('dashboard.master')
@section('main')
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-body">
                <div class=" d-flex justify-content-between">
                    <div>
                        <h2>Sehari Report</h2>
                        <p class="text-success">{{ Session::get('msg') }}</p>
                    </div>
                    <div>
                        <a href="{{ route('sehari.index') }}" class="btn btn-success text-light">
                            Show
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
                    <table class="table table-bordered table-striped">
                        @php
                            $meal_rate = number_format($iftar_cost / $total, 2);
                        @endphp
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Meal</th>
                                <th>Meal Cost</th>
                                <th>Return</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nurul</td>
                                <td>{{ $t_nurul }} Tk</td>
                                <td>{{ $meal_nurul }}</td>
                                <td>{{ $meal_nurul * $meal_rate }} Tk</td>
                                <td>{{ $t_nurul - $meal_nurul * $meal_rate }} Tk</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mizan</td>
                                <td>{{ $t_mizan }} Tk</td>
                                <td>{{ $meal_mizan }}</td>
                                <td>{{ $meal_mizan * $meal_rate }} Tk</td>
                                <td>{{ $t_mizan - $meal_mizan * $meal_rate }} Tk</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Afik</td>
                                <td>{{ $t_afik }} Tk</td>
                                <td>{{ $meal_afik }}</td>
                                <td>{{ $meal_afik * $meal_rate }} Tk</td>
                                <td>{{ $t_afik - $meal_afik * $meal_rate }} Tk</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4>Calculation</h4>
                    <p><strong>Total meal: </strong>{{ $total }}</p>
                    <p><strong>Total Cost: </strong>{{ $iftar_cost }}</p>
                    <p><strong>Meal Rate: </strong>{{ number_format($iftar_cost / $total, 2) }}</p>

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
