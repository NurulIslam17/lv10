@extends('dashboard.master')
@section('main')
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-body">
                <div class=" d-flex justify-content-between">
                    <div>
                        <h1>Division</h1>
                    </div>
                    <div>
                        <a href="{{ route('division.create') }}" class="btn btn-success text-light"><i class="fa fa-plus"></i>
                            Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
