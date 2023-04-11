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
                                    <label for="todo" class="form-label">Your Todo</label>
                                    <textarea class="form-control" name="todo" id="todo" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="todo" class="form-label">Deadline</label></br>
                                    <input type="date" class="form-control" name="deadline" id="">
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
                        <table class="table table-bordered table-striped my_data_table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Todo</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($todos as $todo)
                                    <tr class="row-{{ $todo->id }}">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <p>{{ Str::substr($todo->todo, 0, 25) }}...</p>
                                        </td>
                                        <td>
                                            <p>{{ $todo->deadline }}</p>
                                        </td>
                                        <td id="tr_stat-{{ $todo->id }}">
                                            @if ($todo->status == 0)
                                                <span class="badge badge-warning">Incomplete</span>
                                            @else
                                                <span class="badge badge-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a onclick="changeStat({{ $todo->id }})"
                                                class="btn btn-sm btn-success">Status</a>
                                            <a onclick="deleteTodo(this,{{ $todo->id }})"
                                                class="btn btn-sm btn-danger">Delete</a>
                                            <a type="button" data-toggle="modal"
                                                data-target="#todoDetails-{{ $todo->id }}"
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

    <!-- Modal -->
    @foreach ($todos as $todo)
        <div class="modal fade" id="todoDetails-{{ $todo->id }}" tabindex="-1" aria-labelledby="todoDetailsLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        @if ($todo->status == 1)
                            <p class="badge badge-success py-2 text-dark">Task Completed</p>
                        @else
                            <p class="badge badge-danger py-2 text-dark">Deadline : ( {{ $todo->deadline }})</p>
                        @endif
                        <button type="button" class="btn btn-sm btn-danger btn-close" data-dismiss="modal"
                            aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $todo->todo }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.my_data_table').DataTable();
        });
    </script>
    <script>
        function changeStat(data) {
            let _id = data;
            let url = "{{ route('todo.change.status', ':id') }}";
            url = url.replace(":id", _id);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    $(`#tr_stat-${_id}`).html('');
                    if (response.status == 0) {
                        $(`#tr_stat-${_id}`).append(`<span class="badge badge-warning">Incomplete</span>`);
                    } else {
                        $(`#tr_stat-${_id}`).append(`<span class="badge badge-success">Complete</span>`);
                    }
                }
            });
        }
    </script>
    <script>
        function deleteTodo(e, data) {
            let dataRow = e.parentElement.parentElement;
            let _deleteId = data;
            let url = "{{ route('todo.delete', ':deleteId') }}";
            url = url.replace(":deleteId", _deleteId);
            // alert(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.status == 1) {
                        $(dataRow).remove();
                    }
                }
            })
        }
    </script>
@endpush
