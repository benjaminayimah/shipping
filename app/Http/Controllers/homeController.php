<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller{
    public function getHome(){
        $gallery = DB::table('homes')->where([
            ['type', '=', 'gallery'],
            ['status', '=', '1']
        ])->limit('8')->orderBy('updated_at', 'DESC')->get();
        $banner = DB::table('homes')->where([
            ['type', '=', 'banner'],
            ['status', '=', '1']
        ])->orderBy('updated_at', 'DESC')->get();
        $sections = DB::table('homes')->where('type', 'servicesHead')->first();
        $section2 = DB::table('homes')->where('type', 'aboutUsHead')->first();
        $services_left = DB::table('homes')->where('type', 'servicesBody')->limit(4)->get();
        $services_right = DB::table('homes')->where('type', 'servicesBody')->skip(4)->take(4)->get();
        $aboutImg = DB::table('homes')->where('type', 'aboutImg')->limit(3)->get();
        $who_we_are = DB::table('homes')->where('type', 'WhoWeAre')->first();
        $vision = DB::table('homes')->where('type', 'Vision')->first();
        $mission = DB::table('homes')->where('type', 'Mission')->first();
        $core_values = DB::table('homes')->where('type', 'CoreValues')->get();
        $whychooseHead = DB::table('homes')->where('type', 'WhyChooseUsHead')->first();
        $whychoose = DB::table('homes')->where('type', 'WhyChooseUsBody')->limit(3)->get();
        $galleryHead = DB::table('homes')->where('type', 'GalleryHead')->first();
        $quickLinks = DB::table('homes')->where('type', 'QuickLinks')->get();
        return view('welcome', [
            'gallery' => $gallery,
            'banner' => $banner,
            'serviceHead' => $sections,
            'aboutHead' => $section2,
            'servicesLeft' => $services_left,
            'servicesRight' => $services_right,
            'aboutImg' => $aboutImg,
            'WhoWeAre' => $who_we_are,
            'vision' => $vision,
            'mission' => $mission,
            'coreValues' => $core_values,
            'whychooseHead' => $whychooseHead,
            'galleryHead' => $galleryHead,
            'WhyChooseBody' => $whychoose,
            'quickLinks' => $quickLinks

        ]);
    }

    public function getQuote(){
        $quickLinks = DB::table('homes')->where('type', 'QuickLinks')->get();

        return view('quote', [
            'quickLinks' => $quickLinks
        ]);
    }
    public function getTerms(){
        $quickLinks = DB::table('homes')->where('type', 'QuickLinks')->get();

        return view('terms', [
            'quickLinks' => $quickLinks
        ]);
    }
    public function getPrivacyPolicy(){
        $quickLinks = DB::table('homes')->where('type', 'QuickLinks')->get();

        return view('privacy', [
            'quickLinks' => $quickLinks
        ]);
    }
    public function getHelp(){

        return view('help', [

        ]);
    }
    public function getTracking(){

        return view('tracking', [
        ]);
    }
    public function getTrackerdetails(){
        $shipment = null;
        return view('tracking-result',[
            'shipment' => $shipment,
        ]);
    }
    public function postTracker(Request $request){

        $shipment = null;
        $email = $request['email'];
        $id = $request['trackingId'];
        $shipment = DB::table('shipments')->where([
            ['email', '=', $email],
            ['tracking_id', '=', $id]
        ])->first();
        if ($shipment == null){
            return redirect()->back()->with([
                'status2' => 'Wrong credentials',
                 'shipment' => $shipment
            ]);
        }else{
            return view('tracking-result',[
                'shipment' => $shipment,
            ]);
        }

    }
    public function getGallery(){

        $gallery = DB::table('homes')->where('type', 'gallery')->paginate('12');

        return view('gallery-all', [
            'gallery' => $gallery,
        ]);
    }

}
