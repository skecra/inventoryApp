@extends('layouts.main')

@section('page_title', 'Categories list')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Equipment Categories
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-flat btn-primary" href="/equipment_categories/create">Add new equipment category</a>
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
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipmentCategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td><a href="/equipment_categories/{{$category->id}}">{{ $category->name }}</a> </td>
                                <td>
                                    <a href="/equipment_categories/{{ $category->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                        EDIT
                                    </a>
                                </td>
                                <td>

                                        <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#modalCategory{{$category->id}}">
                                            <i class="fa fa-times"></i> Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete category {{$category->name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="/equipment_categories/{{ $category->id }}" method="POST">
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
