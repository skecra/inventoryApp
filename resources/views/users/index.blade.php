@extends('layouts.main')

@section('page_title', 'Employees list')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Employees
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-flat btn-primary" href="/users/create">Add new employee</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="/users/{{$user->id}}">{{ $user->name }}</a> </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                        EDIT
                                    </a>
                                </td>
                                <td>
                                    @if($user->id != auth()->id())
                                    <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#modalUser{{$user->id}}">
                                        <i class="fa fa-times"></i> Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete user {{$user->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="/users/{{ $user->id }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm btn-flat">
                                                            <i class="fa fa-times"></i>
                                                            DELETE
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection
