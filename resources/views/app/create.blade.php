@extends('layout.app')
@section('contant')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create App</h6>
        </div>
        <div class="card-body">
            <form action="{{url('apps/store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">App Name</label>
                            <input type="text" class="form-control" name="name" placeholder="App Name" value="{{old('name')}}" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bundle Id</label>
                            <input type="text" class="form-control" placeholder="Bundle Id" name="bundle_id" value="{{old('bundle_id')}}" required />
                            @error('bundle_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Force Update Version</label>
                            <input type="number" class="form-control" placeholder="Force Update Version" name="force_update_version" value="{{old('force_update_version')}}" required />
                            @error('force_update_version')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Live Version</label>
                            <input type="number" class="form-control" placeholder="Live Version" name="live_version" value="{{old('live_version')}}" required />
                            @error('live_version')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Intertial Gap Count</label>
                            <input type="number" class="form-control" placeholder="Bundle Id" name="intertial_gap_count" value="{{old('intertial_gap_count')}}" required />
                            @error('intertial_gap_count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Intertial Initial Count</label>
                            <input type="number" class="form-control" placeholder="Intertial Initial Count" name="intertial_initial_count" value="{{old('intertial_initial_count')}}" required />
                            @error('intertial_initial_count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription1</label>
                            <input type="text" class="form-control" name="subscription1" placeholder="Subscription1" value="{{old('subscription1')}}" required>
                            @error('subscription1')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription2</label>
                            <input type="text" class="form-control" name="subscription2" placeholder="Subscription2" value="{{old('subscription2')}}" required>
                            @error('subscription2')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription3</label>
                            <input type="text" class="form-control" name="subscription3" placeholder="Subscription3" value="{{old('subscription3')}}" required>
                            @error('subscription3')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription4</label>
                            <input type="text" class="form-control" name="subscription4" placeholder="Subscription4" value="{{old('subscription4')}}" required>
                            @error('subscription4')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription5</label>
                            <input type="text" class="form-control" name="subscription5" placeholder="Subscription5" value="{{old('subscription5')}}" required>
                            @error('subscription5')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Native Color Code</label>
                            <input type="color" class="form-control" name="native_color" value="{{old('native_color')}}" required>
                            @error('native_color')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection