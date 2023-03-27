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
                        <a href="{{ route('division.index') }}" class="btn btn-success text-light"><i class="fa fa-list"></i>
                            List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <h4 class="card-title mb-4">Form grid layout</h4>

                <form action="{{ route('division.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="division">Division</label>
                        <input type="text" name="name" class="form-control" placeholder="Division name"
                            id="division">
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email@gmail.com"
                                    id="email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="zip">Zip</label>
                                <input type="text" name="zip" class="form-control" placeholder="ZIP Code"
                                    id="zip">
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status" class="custom-control-input" id="formrow-customCheck">
                            <label class="custom-control-label" for="formrow-customCheck">Check me out</label>
                        </div>
                    </div> --}}
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
