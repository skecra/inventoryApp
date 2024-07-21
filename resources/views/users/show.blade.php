@extends('layouts.main')

@section('page_title', 'Add new employee')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Add new employee
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <div class="row">
                        <div class="col-5 table-responsive">
                            <table class="table table-active">
                                <tr>
                                    <th>ID</th>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>{{$user->department->name}}</td>
                                </tr>
                                <tr>
                                    <th>Position</th>
                                    <td>{{$user->position->name}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>



                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection

@section('additional_scripts')
    <script src="{{asset('js/users/create.js')}}"></script>
@endsection
