@extends('layouts.main')

@section('page_title', 'Category details')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Category details
                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <div class="row">
                        <div class="col-5 table-responsive">
                            <table class="table table-active">
                                <tr>
                                    <th>ID</th>
                                    <td>{{$equipmentCategory->id}}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$equipmentCategory->name}}</td>
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
