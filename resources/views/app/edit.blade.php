@extends('layout.app')
@section('link')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
@endsection
@section('contant')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{$app->name}}</h1>
    <form action="{{url('apps/update/'.$app->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="app_id" value="{{$app->id}}" />
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create App</h6>
            </div>
            <div class="card-body">
                <p class="text-success" id="adsMsg"></p>
                <div class="form-group">
                    <label class="form-check-label">
                        IsAdOn
                    </label>
                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" data-size="sm" class="switches" @if($app->is_ad_on == true) checked @endif data-name="is_ad_on" />
                </div>
                <div class="form-group">
                    <label class="form-check-label">
                        IsCustomAdOn
                    </label>
                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" data-size="sm" class="switches" @if($app->is_custom_ads_on == true) checked @endif data-name="is_custom_ads_on" />
                </div>
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
                        <div class="form-group">
                            <label for="exampleInputPassword1">Force Update varsion</label>
                            <input type="number" class="form-control" placeholder="Bundle Id" name="force_update_version" @if(isset($app->id)) value="{{$app->force_update_version}}" @endif required />
                            @error('force_update_version')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Live Version</label>
                            <input type="number" class="form-control" placeholder="Live Version" name="live_version" @if(isset($app->id)) value="{{$app->live_version}}" @endif required />
                            @error('live_version')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Intertial Gap Count</label>
                            <input type="number" class="form-control" placeholder="Bundle Id" name="intertial_gap_count" @if(isset($app->id)) value="{{$app->intertial_gap_count}}" @endif required />
                            @error('intertial_gap_count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Intertial Initial Count</label>
                            <input type="number" class="form-control" placeholder="Intertial Initial Count" name="intertial_initial_count" @if(isset($app->id)) value="{{$app->intertial_initial_count}}" @endif required />
                            @error('intertial_initial_count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- //subscription --}}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription1</label>
                            <input type="text" class="form-control" name="subscription1" placeholder="Subscription1" @if(isset($app->id)) value="{{$app->subscription1}}" @endif required>
                            @error('subscription1')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription2</label>
                            <input type="text" class="form-control" name="subscription2" placeholder="Subscription2" @if(isset($app->id)) value="{{$app->subscription2}}" @endif required>
                            @error('subscription2')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription3</label>
                            <input type="text" class="form-control" name="subscription3" placeholder="Subscription3" @if(isset($app->id)) value="{{$app->subscription3}}" @endif required>
                            @error('subscription3')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription4</label>
                            <input type="text" class="form-control" name="subscription4" placeholder="Subscription4" @if(isset($app->id)) value="{{$app->subscription4}}" @endif required>
                            @error('subscription4')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Subscription5</label>
                            <input type="text" class="form-control" name="subscription5" placeholder="Subscription5" @if(isset($app->id)) value="{{$app->subscription5}}" @endif required>
                            @error('subscription5')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Native Color Code</label>
                            <input type="color" class="form-control" name="native_color" @if(isset($app->id)) value="{{$app->native_color}}" @endif required>
                            @error('native_color')
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
            <form id="{{$key}}-form">
                <p id="{{$key}}-ajax_msg" class="text-success"></p>
                <div class="row">
                    @foreach ($ads_types as $clmName =>$ad_type)
                    @if ($key == 'MyAds')
                    @break
                    @endif
                    <div class="col-md-12 mb-2">
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
                                data-id="{{$key}}" data-type="{{$ad_type->name}}" class="form-control customInput" name="{{$ad_type->name}}"/>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if ($key == 'MyAds')
                    @php
                        $array = json_decode($app->app_list);
                    @endphp
                    @isset($app_list)
                    @foreach ($app_list as $listApp)
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input checkbox-Applist" type="checkbox" value="{{$listApp->id}}" name="appList" @if (isset($array))
                            @if(in_array($listApp->id,$array)) checked @else  @endif
                            @endif />
                            <label class="form-check-label" for="flexCheckDefault">
                              {{$listApp->name}}
                            </label>
                          </div>
                    </div>
                @endforeach
                    @endisset
                        <div class="col-md-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                    app_icon
                                </label>
                                <div class="" style="">
                                        <input type="file" name="app_icon" id="inputImage" class="form-control" accept="image/*">
                                        <span class="text-danger" id="image-input-error"></span>
                                </div>
                            </div>
                            @if(isset($adds['MyAds']->app_icon))
                            <span style="height: 100px; width:100px">
                                <img src="{{url($adds['MyAds']->app_icon)}}" alt="..." height="100px" width="100px"
                                    id="app_icon_src" class="img-thumbnail" />
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                    Image
                                </label>
                                <div class="" style="">
                                        <input type="file" name="app_image" class="form-control customInput" data-id="MyAds"
                                            data-type="" accept="image/*" />
                                        <span class="text-danger" id="image-input-error2"></span>
                                </div>
                            </div>
                            @if(isset($adds['MyAds']->image))
                            <span style="height: 100px; width:100px">
                                <img src="{{url($adds['MyAds']->image)}}" alt="..." height="100px" width="100px" id="app_img_src"
                                    class="img-thumbnail" />
                            </span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                    description
                                </label>
                                <div class="" style=""><input type="text" class="form-control customInput" data-id="MyAds" name="description" data-type="description" @if (isset($adds['MyAds']->description))
                                    value="{{$adds['MyAds']->description}}"
                                @endif /></div>
                            </div>
                        </div>
                        <div class="col-md-12  mb-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                    link
                                </label>
                                <div class="" style=""><input type="text" class="form-control customInput" data-id="MyAds" name="link" data-attr="link" data-type="" @if (isset($adds['MyAds']->link))
                                    value="{{$adds['MyAds']->link}}"
                                @endif /></div>
                            </div>
                        </div>
                        <div class="col-md-12  mb-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                    title
                                </label>
                                <div class="" style=""><input type="text" class="form-control" data-id="MyAds" data-attr="title" name="title" data-type="image" @if (isset($adds['MyAds']->title))
                                    value="{{$adds['MyAds']->title}}"
                                @endif /></div>
                            </div>
                        </div>
                    @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endforeach

</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
<script>
    app_id = $('#app_id').val();
    $(document).ready(function() {
    baseUrl = window.location.origin;
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.checkbox-Applist').change(function() {
        var array = []; 
            $("input:checkbox[name=appList]:checked").each(function() { 
                array.push($(this).val()); 
            }); 
            $.ajax({
                    url: baseUrl+'/update-app-list-Myads/'+app_id,
                    data: {data: array},
                    success: function (response) {
                        $('#MyAds-ajax_msg').text(response.msg);
                        console.log(response);
                    },
                    error: function(error){}
                });
            console.log(array);
        var checkboxId = $(this).attr('id');
            if ($(this).is(':checked')) {
                
            } else {
                console.log('not checked');
            }
    });
    $('.switches').change(function(){
        dataName = $(this).data('name');
        $.ajax({
            url: baseUrl+'/change-add-status/'+app_id,
            data: {data : dataName},
            success: function(resonse){
                $('#adsMsg').text(resonse.msg)
            },
            error: function(){}
        })
    });
        // $('.checkbox').change(function() {
        //     var checkboxId = $(this).attr('id');
        //     if ($(this).is(':checked')) {
        //         $('.newsItem-' + checkboxId).show();
        //         console.log('checked');
        //     } else {
        //         $('.newsItem-' + checkboxId).hide();
        //         console.log('not checked');
        //     }
        // });
        // $(document).on('focusout','.customInput',function(){
        //     ad = $(this).attr('data-id');
        //     ad_type = $(this).attr('data-type');
        //     ad_value = $(this).val();
        //     app_id = $('#app_id').val();
        //     $.ajax({
        //         type: "POST",
        //         url: baseUrl+'/data/update/'+app_id,
        //         data: {data: {
        //             'app_id' : app_id , 'ad' : ad,'ad_type' : ad_type,'ad_value' : ad_value
        //         }}
        //     })
        //     console.log(ad,ad_type,ad_value,app_id);
        // })
        // $('#app_icon-upload').submit(function(e) {
        //     e.preventDefault();
        //     let formData = new FormData(this);
        //     $.ajax({
        //     type:'POST',
        //     url: baseUrl+"/upload-appIcon/"+app_id,
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: (response) => {
        //         if (response) {
        //             this.reset();
        //             $('#app_icon_src').attr('src', response.newSrc);
        //         }
        //         },
        //         error: function(response){
        //             $('#image-input-error').text(response.responseJSON.message);
        //         }
        //     });
        // });
        // $('#image-upload').submit(function(e) {
        //     e.preventDefault();
        //     let formData = new FormData(this);
        //     $.ajax({
        //     type:'POST',
        //     url: baseUrl+"/upload-appImage/"+app_id,
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: (response) => {
        //         if (response) {
        //             console.log(response);
        //             this.reset();
        //             $('#app_img_src').attr('src', response.newSrc);
        //         }
        //         },
        //         error: function(response){
        //             $('#image-input-error2').text(response.responseJSON.message);
        //         }
        //     });
        // });
        $('#MyAds-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
            type:'POST',
            url: baseUrl+"/save-myAds-data/"+app_id,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                if (response) {
                    console.log(response);
                    $('#app_img_src').attr('src',response.image);
                    $('#app_icon_src').attr('src',response.app_icon);
                    $('#MyAds-ajax_msg').text(response.msg);
                }
                },
                error: function(response){
                    $('#image-input-error').text(response.responseJSON.message);
                }
            });
        });
        $('#Facebook-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
            type:'POST',
            url: baseUrl+"/save-facebook-data/"+app_id,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                if (response) {
                    $('#Facebook-ajax_msg').text(response.msg);
                }
                },
                error: function(response){
                    $('#image-input-error').text(response.responseJSON.message);
                }
            });
        });
        $('#Google-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
            type:'POST',
            url: baseUrl+"/save-google-data/"+app_id,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                if (response) {
                    $('#Google-ajax_msg').text(response.msg);
                }
                },
                error: function(response){
                    $('#image-input-error').text(response.responseJSON.message);
                }
            });
        });
    });
</script>
@endsection