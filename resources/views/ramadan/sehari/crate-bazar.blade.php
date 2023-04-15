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
                        <a href="{{ route('bazar.list') }}" class="btn btn-success text-light">
                            Bazar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('store.sehari.bazar') }}" method="post">
                        <p class="text-danger">
                            {{ Session::get('msg') }}
                        </p>

                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Ramadan</label>
                                <input type="text" class="form-control rounded-0" name="ramadan" id="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Name</label>
                                <select id="division" name="name" required class="form-control">
                                    <option selected disabled>Choose Name</option>
                                    <option value="nurul">Nurul</option>
                                    <option value="mizan">Mizan</option>
                                    <option value="afik">Afik</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Amount</label>
                                <input type="text" class="form-control rounded-0" name="amount" id="">
                            </div>
                            <div class="col-md-12">
                                <input class="btn btn-sm btn-success" type="submit" value="Create">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
