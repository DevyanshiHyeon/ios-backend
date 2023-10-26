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

class AppController extends Controller
{
    function index()
    {
        return view('app.index');
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
                    'action' => '<div class="d-flex"><a href="' . url('apps/edit/' . $app->id) . '" class="btn btn-primary mr-2">Edit</a><a href="' . url('api/application/' . $app->id) . '" class="btn btn-success" target="_blank">Api Response</a></div>'
                ];
            }
            return Datatables::of($data)->rawColumns(['action'])->make(true);
        }
    }
    function create()
    {
        return view('app.create');
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bundle_id' => 'required',
        ]);
        $app = App::create(
            [
                'name' => $request->name,
                'bundle_id' => $request->bundle_id
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
        $app = App::find($app_id);
        $google = Google::where('app_id', $app_id)->select('nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds')->first();
        $facebook = Facebook::where('app_id', $app_id)->select('nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds')->first();
        $myAds = MyAds::where('app_id', $app_id)->select('nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds', 'app_icon','image', 'description', 'link', 'title')->first();
        $adds = ['Google' => $google, 'Facebook' => $facebook, 'MyAds' => $myAds];
        $ads_types = Advertisement_type::all();
        return view('app.edit', ['app' => $app, 'adds' => $adds, 'ads_types' => $ads_types]);
    }
    function update(Request $request, $app_id)
    {
        $app = App::find($app_id);
        $app->update([
            'name' => $request->name,
            'bundle_id' => $request->bundle_id,
        ]);
        notify()->success('Laravel Notify is awesome!');
        return redirect('apps');
    }
    function applicationApi($app_id)
    {
        try {
            $rawData = App::FindOrFail($app_id);
            $google = Google::where('app_id', $app_id)->first(['nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds']);
            $facebook = Facebook::where('app_id', $app_id)->first(['nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds']);
            $myAds = MyAds::where('app_id', $app_id)->first(['nativeAds', 'interstitialAds', 'bannerAds', 'addOpenAds', 'rewardedAds', 'app_icon', 'description', 'link', 'title']);
            $data = [
                'name' => $rawData->name,
                'bundle_id' => $rawData->bundle_id,
                'Google' => $google,
                'facebook' =>  $facebook,
                'myads' => $myAds,
            ];
            return response()->json(['status' => '200', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => '404', 'message' => 'data not found!'], 404);
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
