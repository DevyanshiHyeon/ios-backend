<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Advertisement_type;
use App\Models\App;
use App\Models\Facebook;
use App\Models\Google;
use App\Models\MyAds;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    function index()
    {
        if(Auth::check()){
            return view('app.index');
        }else{
            return redirect('/')->with(['Error'=> 'Login First']);
        }
    }
    function appList(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $i = 1;
            $apps = App::select('id', 'name', 'bundle_id')->orderBy('id', 'DESC')->get();
            foreach ($apps as $key => $app) {
                $data[] = [
                    'id' => $i++,
                    'name' => $app->name,
                    'bundle_id' => $app->bundle_id,
                    'action' => '<div class="d-flex"><a href="' . url('apps/edit/' . $app->id) . '" class="btn btn-primary mr-2">Edit</a><a href="' . url('api/application/' . $app->bundle_id) . '" class="btn btn-success" target="_blank">Api Response</a></div>'
                ];
            }
            return Datatables::of($data)->rawColumns(['action'])->make(true);
        }
    }
    function create()
    {
        if(Auth::check()){
            return view('app.create');
        }else{
            return redirect('/')->with(['Error'=> 'Login First']);
        }
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bundle_id' => 'required|unique:apps,bundle_id',
            'force_update_version' => 'required|numeric',
            'live_version' => 'required|numeric',
            'intertial_gap_count' => 'required|integer',
            'intertial_initial_count' => 'required|integer'
            
        ]);
        $app = App::create(
            [
                'name' => $request->name,
                'bundle_id' => $request->bundle_id,
                'force_update_version' => $request->force_update_version,
                'live_version' => $request->live_version,
                'intertial_gap_count' => $request->intertial_gap_count,
                'intertial_initial_count' => $request->intertial_initial_count,
            ]
        );
        if ($app) {
            Google::create(['app_id' => $app->id]);
            Facebook::create(['app_id' => $app->id]);
            MyAds::create(['app_id' => $app->id]);
            notify()->success('App Created Successfully!');
            return redirect('apps');
        }
    }
    function edit($app_id)
    {
        if(Auth::check()){
            $app = App::find($app_id);
            $google = Google::where('app_id', $app_id)->select('nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds')->first();
            $facebook = Facebook::where('app_id', $app_id)->select('nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds')->first();
            $myAds = MyAds::where('app_id', $app_id)->select('nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds', 'app_icon','image', 'description', 'link', 'title')->first();
            $adds = ['Google' => $google, 'Facebook' => $facebook, 'MyAds' => $myAds];
            $ads_types = Advertisement_type::all();
            $appList = App::all()->except($app_id);
            return view('app.edit', ['app' => $app, 'adds' => $adds, 'ads_types' => $ads_types,'app_list' => $appList]);
        }else{
            return redirect('/')->with(['Error'=> 'Login First']);
        }
    }
    function update(Request $request, $app_id)
    {
        $request->validate([
            'name' => 'required',
            'bundle_id' => 'required|unique:apps,bundle_id,'.$app_id,
            'force_update_version' => 'required|numeric',
            'live_version' => 'required|numeric',
            'intertial_gap_count' => 'required|integer',
            'intertial_initial_count' => 'required|integer'
            
        ]);
        $app = App::find($app_id);
        $app->update([
            'name' => $request->name,
            'bundle_id' => $request->bundle_id,
            'force_update_version' => $request->force_update_version,
            'live_version' => $request->live_version,
            'intertial_gap_count' => $request->intertial_gap_count,
            'intertial_initial_count' => $request->intertial_initial_count,
        ]);
        notify()->success('Laravel Notify is awesome!');
        return redirect('apps');
    }
    function applicationApi($bundle_id)
    {
        try {
            $myAdData = [];
            $rawData = App::where('bundle_id',$bundle_id)->first();
            $app_id = $rawData->id;
            $google = Google::where('app_id', $app_id)->first(['nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds'])->toArray();
            foreach ($google as $key => $value) {
                if (is_null($google[$key])) {
                     $google[$key] = "";
                }
            }
            $facebook = Facebook::where('app_id', $app_id)->first(['nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds'])->toArray();
            foreach ($facebook as $key => $value) {
                
                if (is_null($facebook[$key])) {
                     $facebook[$key] = "";
                }
            }
            $myAds = MyAds::where('app_id', $app_id)->first(['app_icon', 'description', 'link', 'title'])->toArray();
            foreach ($myAds as $key => $value) {
                
                if (is_null($myAds[$key])) {
                     $myAds[$key] = "";
                }
            }
            if(isset($rawData->app_list)){
                $appsIds = json_decode($rawData->app_list);
                foreach ($appsIds as $key => $appId) {
                    $listedAppData = App::find($appId);
                    $app = MyAds::where('app_id',$appId)->first();
                    $myAdData[] = [
                        // 'bundleId' => $listedAppData->bundle_id,
                        'appImage' => $app->image ?: '',
                            'appIcon' => $app->app_icon ?: '',
                            'title' => $app->title ?: '',
                            'description' => $app->description ?: '',
                            'link' => $app->link ?: ''
                    ];
                }
                $myAds['appList'] = $myAdData;
                // array_push($myAds,$myAdData);
            }
            // if($rawData->is_ad_on == true){
            //     $is_ad_on = 'true';
            // }else{$is_ad_on = 'false';}
            // if($rawData->is_custom_ads_on == true){
            //     $is_custom_ads_on = 'true';
            // }else{$is_custom_ads_on = 'false';}
            $data = [
                'is_ad_on' => $rawData->is_ad_on,
                'is_custom_ads_on' => $rawData->is_custom_ads_on,
                'name' => $rawData->name ?: '',
                'bundle_id' => $rawData->bundle_id ?: '',
                
                'force_update_version' => $rawData->force_update_version,
                'live_version' => $rawData->live_version,
                'intertial_gap_count' => $rawData->intertial_gap_count,
                'intertial_initial_count' => $rawData->intertial_initial_count,
                
                'Google' => $google ?: '',
                'facebook' =>  $facebook ?: '',
                'myads' => $myAds ?: '',
            ];
            return response()->json(['status' => '200', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => '404', 'message' => 'Data Not Found'], 404);
            // return response()->json(['status' => '404', 'message' => $e->getMessage()], 404);
        }
    }
    function updateData(Request $request, $app_id)
    {
        if ($request->data['ad'] == 'Google') {
            Google::where('app_id', $request->data['app_id'])->update([$request->data['ad_type'] => $request->data['ad_value']]);
        }
        if ($request->data['ad'] == 'Facebook') {
            Facebook::where('app_id', $request->data['app_id'])->update([$request->data['ad_type'] => $request->data['ad_value']]);
        }
        if ($request->data['ad'] == 'MyAds') {
            MyAds::where('app_id', $request->data['app_id'])->update([$request->data['ad_type'] => $request->data['ad_value']]);
        }
    }
    function uploadAppIcon(Request $request, $app_id)
    {
        $request->validate([
            'app_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $app_icon_name = time() . '.' . $request->app_icon->extension();
        $request->app_icon->move(public_path('app_icon/'), $app_icon_name);
        $app_icon = url('app_icon/' . $app_icon_name);
        $update = MyAds::where('app_id', $app_id)->update(['app_icon' => $app_icon]);
        if ($update) {
            return response()->json(['newSrc' => $app_icon,'Image uploaded successfully']);
        }
    }
    function uploadAppImage(Request $request, $app_id)
    {
        $request->validate([
            'app_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $app_icon_name = time() . '.' . $request->app_image->extension();
        $request->app_image->move(public_path('app_image/'), $app_icon_name);
        $app_icon = url('app_image/' . $app_icon_name);
        $update = MyAds::where('app_id', $app_id)->update(['image' => $app_icon]);
        if ($update) {
            return response()->json(['newSrc' => $app_icon,'Image uploaded successfully']);
        }
    }
}
