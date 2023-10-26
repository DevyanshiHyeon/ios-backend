@extends('layout.app')
@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endsection
@section('contant')
<div class="container-fluid">
    <form action="{{url('apps/update/'.$app->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="app_id" value="{{$app->id}}" />
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create App</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">App Name</label>
                            <input type="text" class="form-control" name="name" placeholder="App Name"
                                @if(isset($app->id))
                            value="{{$app->name}}"
                            @endif required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bundle Id</label>
                            <input type="text" class="form-control" placeholder="Bundle Id" name="bundle_id"
                                @if(isset($app->id))
                            value="{{$app->bundle_id}}"
                            @endif required />
                            @error('bundle_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @foreach ($adds as $key => $add)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$key}}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- @dd($add) --}}
                @foreach ($ads_types as $clmName =>$ad_type)
                <div class="col-md-2">
                    <div class="form-check">
                        {{-- <input class="form-check-input checkbox" type="checkbox" value=""
                            id="{{$key.'-'.$ad_type->name}}"> --}}
                        <label class="form-check-label">
                            {{$ad_type->name}}
                        </label>
                        @php
                        if($key == 'Google'){
                        $value = \App\Models\Google::where('app_id',$app->id)->first($ad_type->name);
                        }
                        if($key == 'Facebook'){
                        $value = \App\Models\Facebook::where('app_id',$app->id)->first($ad_type->name);
                        }
                        if($key == 'MyAds'){
                        $value = \App\Models\MyAds::where('app_id',$app->id)->first($ad_type->name);
                        }
                        @endphp
                        <div class="newsItem-{{$key.'-'.$ad_type->name}}" @if(isset($ad_type->name)) style="display:
                            block;" @else style="display: none;" @endif>
                            <input @if(isset($ad_type->name)) value="{{$value[$ad_type->name]}}" @endif type="text"
                            data-id="{{$key}}" data-type="{{$ad_type->name}}" class="form-control customInput"/>
                        </div>
                    </div>
                </div>
                @endforeach
                @if ($key == 'MyAds')
                <div class="col-md-2">
                    <div class="form-check">
                        <label class="form-check-label">
                            description
                        </label>
                        <div class="" style=""><input type="text" class="form-control customInput" data-id="MyAds"
                                data-type="description" /></div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <label class="form-check-label">
                            link
                        </label>
                        <div class="" style=""><input type="text" class="form-control customInput" data-id="MyAds"
                                data-attr="link" data-type="app_icon" /></div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <label class="form-check-label">
                            title
                        </label>
                        <div class="" style=""><input type="text" class="form-control" data-id="MyAds" data-attr="title"
                                data-type="image" /></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            app_icon
                        </label>
                        <div class="" style="">
                            <form action="{{ url('upload-appIcon') }}" method="POST" id="app_icon-upload"
                                enctype="multipart/form-data">
                                <input type="file" name="app_icon" id="inputImage" class="form-control">
                                <span class="text-danger" id="image-input-error"></span>
                        </div>
                    </div>
                    <span style="height: 100px; width:100px">
                        <img src="{{url($adds['MyAds']->app_icon)}}" alt="..." height="100px" width="100px"
                            id="app_icon_src" class="img-thumbnail" />
                    </span>
                </div>
                <div class="col-md-1 pt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            Image
                        </label>
                        <div class="" style="">
                            <form action="{{ url('upload-appImage') }}" method="POST" id="image-upload"
                                enctype="multipart/form-data">
                                <input type="file" name="app_image" class="form-control customInput" data-id="MyAds"
                                    data-type="" />
                                <span class="text-danger" id="image-input-error2"></span>
                        </div>
                    </div>
                    <span style="height: 100px; width:100px">
                        <img src="{{url($adds['MyAds']->image)}}" alt="..." height="100px" width="100px"
                            id="app_img_src" class="img-thumbnail" />
                    </span>
                </div>
                <div class="col-md-1 pt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    app_id = $('#app_id').val();
    $(document).ready(function() {
    baseUrl = window.location.origin;
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $('.checkbox').change(function() {
            var checkboxId = $(this).attr('id');
            if ($(this).is(':checked')) {
                $('.newsItem-' + checkboxId).show();
                console.log('checked');
            } else {
                $('.newsItem-' + checkboxId).hide();
                console.log('not checked');
            }
        });
        $(document).on('focusout','.customInput',function(){
            ad = $(this).attr('data-id');
            ad_type = $(this).attr('data-type');
            ad_value = $(this).val();
            app_id = $('#app_id').val();
            $.ajax({
                type: "POST",
                url: baseUrl+'/data/update/'+app_id,
                data: {data: {
                    'app_id' : app_id , 'ad' : ad,'ad_type' : ad_type,'ad_value' : ad_value
                }}
            })
            console.log(ad,ad_type,ad_value,app_id);
        })
        $('#app_icon-upload').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
            type:'POST',
            url: baseUrl+"/upload-appIcon/"+app_id,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                if (response) {
                    this.reset();
                    $('#app_icon_src').attr('src', response.newSrc);
                }
                },
                error: function(response){
                    $('#image-input-error').text(response.responseJSON.message);
                }
            });
        });
        $('#image-upload').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
            type:'POST',
            url: baseUrl+"/upload-appImage/"+app_id,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                if (response) {
                    console.log(response);
                    this.reset();
                    $('#app_img_src').attr('src', response.newSrc);
                }
                },
                error: function(response){
                    $('#image-input-error2').text(response.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection