@extends('layout.app')
@section('contant')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">App List</h6>
        </div>
        <div class="card-body">
            <div class="my-3">
                <a href="{{url('apps/create')}}" class="btn btn-primary">Add App</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Bundle Id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{url('assets/custom/js/app/index.js')}}"></script>
@endsection