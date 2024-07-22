@extends('layouts.main')

@section('page_title', 'Edit equipment')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Edit Equipment
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <td>{{$equipment->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$equipment->name}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{$equipment->equipmentCategory->name}}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{$equipment->quantity}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$equipment->description}}</td>
                        </tr>
                    </table>



                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection


