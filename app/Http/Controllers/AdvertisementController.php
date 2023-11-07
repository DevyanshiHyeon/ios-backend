<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Facebook;
use App\Models\Google;
use App\Models\MyAds;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    function saveFacebookData(Request $request,$app_id){
        $update = Facebook::where('app_id',$app_id)->update($request->all());
        if($update){
            return response()->json(['msg' => 'Facebook Data updated successfully']);
        }else{
            // notify()->error('Something went Wrong!');
        }
    }
    function saveGoogleData(Request $request,$app_id){
        $update = Google::where('app_id',$app_id)->update($request->all());
        if($update){
            return response()->json(['msg' => 'Google Data updated successfully']);
        }else{
            // notify()->error('Something went Wrong!');
        }
    }
    function saveMyAdsData(Request $request,$app_id){
        $my_add = MyAds::where('app_id',$app_id)->first();
        // dd($my_add);
        if ($request->hasFile('app_icon')) {
            $app_icon_name = time() . '.' . $request->app_icon->extension();
            $request->app_icon->move(public_path('app_icon/'), $app_icon_name);
            $app_icon = url('app_icon/' . $app_icon_name);
        } else {
            $app_icon = $my_add->app_icon;
        }
        if ($request->hasFile('app_image')) {
            $app_image_name = time() . '.' . $request->app_image->extension();
            $request->app_image->move(public_path('app_image/'), $app_image_name);
            $app_image =  url('app_image/' . $app_image_name);
        } else {
            $app_image = $my_add->image;
        }
        $update = $my_add->update([
            'app_icon' => $app_icon ,
            'image' => $app_image ,
            'description' => $request->description ,
            'link' => $request->link ,
            'title' => $request->title
        ]);
        if($update){
            return response()->json(['app_icon'=>$app_icon,'image'=>$app_image,'msg' => 'MyAds Data updated successfully']);
        }else{
            // notify()->error('Something went Wrong!');
        }
    }
    function updateAppListMyads(Request $request,$app_id){
        $app = App::find($app_id);
        $appList = json_encode($request->data);
        $update = $app->update([
            'app_list' => $appList
        ]);
        if($update){
            return response()->json(['msg' => 'MyAds Data updated successfully']);
        }else{
            // notify()->error('Something went Wrong!');
        }
    }
    function changeAddStatus(Request $request,$app_id){
        $name = $request->data;
        $app = App::find($app_id);
        if($app->$name == true){
            $update = $app->update([
                $name => false
            ]);
        }else{
           $update = $app->update([
                $name => true
            ]);
        }
        if($update){
            return response()->json(['msg' => 'Ads Data updated successfully']);
        }
    }
    function changeGoogleVariableStatus(Request $request,$variableName,$app_id){
        $variableName = lcfirst($variableName);
        $googleData = Google::where('app_id',$app_id)->first();
        $clmName = $variableName.'_status';
        if($googleData->$clmName == true){
            $change = false;
        }else{
            $change = true;
        }
        $update = $googleData->update([
            $clmName => $change
        ]);
        if($update){
            return response()->json(['msg' => 'Google Data updated successfully']);
        }
    }
}
