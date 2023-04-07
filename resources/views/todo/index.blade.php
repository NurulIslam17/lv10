@extends('dashboard.master')
@section('main')
    <div class="todo_div">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>My Todo App</h3>
                        <p>{{ Session::get('msg') }}</p>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('todo.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="todo" class="form-label">Example textarea</label>
                                    <textarea class="form-control" name="todo" id="todo" rows="3"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <input class="btn btn-sm btn-success" type="submit" value="Add ToDo">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>Todo List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Todo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($todos as $todo)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <p>{{ Str::substr($todo->todo, 0, 40) }}...</p>
                                        </td>
                                        <td>
                                            @if ($todo->status == 0)
                                                <span class="badge badge-warning">Incomplete</span>
                                            @else
                                                <span class="badge badge-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-success">Status</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            <a type="button" data-toggle="modal" data-target="#todoDetails"
                                                class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#todoDetails">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="todoDetails" tabindex="-1" aria-labelledby="todoDetailsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="todoDetailsLabel">Modal title</h5>
                    <button type="button" class="btn btn-danger btn-close" data-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
