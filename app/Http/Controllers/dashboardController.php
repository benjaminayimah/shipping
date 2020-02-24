<?php

namespace App\Http\Controllers;

use App\Home;
use App\Newsletter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Caster\DsCaster;

class dashboardController extends Controller{
    //
    public function getAdminGallery(){

        $gallery = DB::table('homes')->where('type', 'gallery')->orderBy('id', 'DESC')->paginate('12');

        return view('admin.dashboard-gallery', [
            'gallery' => $gallery
        ]);
    }
    public function getAdminBanner(){

        $banner = DB::table('homes')->where('type', 'banner')->orderBy('id', 'DESC')->paginate('12');

        return view('admin.dashboard-banner', [
            'banner' => $banner
        ]);
    }
    public function postAdminGallery(Request $request){

        if ($request['type'] == 'gallery'){
            $type = 'gallery';
            $rawfile = $_FILES['galleryImg']["name"];
            $split = explode(".", $rawfile);
            $fileExt = end($split);
            $imgtitle = strtolower($request['title']);
            $imgFinaltitle = preg_replace('#[^a-z0-9]#i', '', $imgtitle);
            $filename = $imgFinaltitle . '_'. rand(1,999999999) . '.'. $fileExt;
            $file = $request->file('galleryImg');
            if ($file){
                Storage::disk('public')->put($filename, File::get($file));
                $gallery = new Home();
                $gallery->type = $type;
                $gallery->image = $filename;
                $gallery->caption = $request['title'];
                $gallery->sub_caption1 = $request['subTitle1'];
                $gallery->sub_caption2 = $request['subTitle2'];
                $gallery->sub_caption3 = $request['subTitle3'];
                $gallery->save();

                return redirect()->back()->with('status', 'Item Uploaded Successfully!!!');
            }else{
                return redirect()->back()->with('status2', 'No image selected');
            }

        }
        if ($request['type'] == 'banner'){
            $type = 'banner';
            $rawfile = $_FILES['BannerImg']["name"];
            $split = explode(".", $rawfile);
            $fileExt = end($split);
            $imgFinaltitle = 'banner_img';
            $filename = $imgFinaltitle . '_'. rand(1,999999999) . '.'. $fileExt;
            $file = $request->file('BannerImg');
            if ($file){
                Storage::disk('public')->put($filename, File::get($file));
                $banner = new Home();
                $banner->type = $type;
                $banner->image = $filename;
                $banner->caption = $request['caption1'];
                $banner->sub_caption1 = $request['caption2'];
                $banner->btn = $request['imgButton'];
                $banner->btn_target = $request['btnTarget'];
                $banner->save();
                return redirect()->back()->with('status', 'Item Uploaded Successfully!!!');
            }else{
                return redirect()->back()->with('status2', 'No image selected');
            }
        }
    }
    public function getGalleryimg($filename){
        $file = Storage::disk('public')->get($filename);
        return new Response($file, 200);
    }
    public function postDelGallery(Request $request){
        //check if user has credentials
        $id = $request['inputId'];
        $img = $request['image'];
        $del = Home::find($id);
        $del->delete();
        Storage::disk('public')->delete($img);
        return redirect()->back()->with('status', 'Image deleted');
    }
    public function postEditedGal(Request $request){

        $this->validate($request, [
            'title' => 'required',
        ]);
        $id = trim($request['inputId']);
        $old_image = trim($request['imgGalOld']);
        $file = $request->file('galleryImg');
        $featured = $request['featured'];
        $type = $request['type'];
        if ($type == 'gallery'){
            if($file){
                $rawfile = $_FILES['galleryImg']["name"];
                $split = explode(".", $rawfile);
                $fileExt = end($split);
                $imgtitle = strtolower($request['title']);
                $imgFinaltitle = preg_replace('#[^a-z0-9]#i', '', $imgtitle);

                $filename = $imgFinaltitle . '_'. rand(1,999999999) . '.'. $fileExt;

                $gallery = Home::find($id);
                $gallery->image = $filename;
                $gallery->caption = $request['title'];
                $gallery->sub_caption1 = $request['subTitle1'];
                $gallery->sub_caption2 = $request['subTitle2'];
                $gallery->sub_caption3 = $request['subTitle3'];
                $gallery->update();

                Storage::disk('public')->delete($old_image);
                Storage::disk('public')->put($filename, File::get($file));
                return redirect()->back()->with('status', 'Image updated');
            }else{
                $gallery = Home::find($id);
                $gallery->caption = $request['title'];
                $gallery->sub_caption1 = $request['subTitle1'];
                $gallery->sub_caption2 = $request['subTitle2'];
                $gallery->sub_caption3 = $request['subTitle3'];
                $gallery->update();

                return redirect()->back()->with('status', 'Image updated');
            }
        }elseif ( $type == 'banner'){
            if($file){
                $rawfile = $_FILES['galleryImg']["name"];
                $split = explode(".", $rawfile);
                $fileExt = end($split);
                $imgtitle = 'banner_img';
                $imgFinaltitle = preg_replace('#[^a-z0-9]#i', '', $imgtitle);

                $filename = $imgFinaltitle . '_'. rand(1,999999999) . '.'. $fileExt;

                $banner = Home::find($id);
                $banner->image = $filename;
                $banner->caption = $request['title'];
                $banner->sub_caption1 = $request['caption2'];
                $banner->btn = $request['button'];
                $banner->btn_target = $request['target'];
                $banner->update();

                Storage::disk('public')->delete($old_image);
                Storage::disk('public')->put($filename, File::get($file));
                return redirect()->back()->with('status', 'Image updated');

            }else{
                $banner = Home::find($id);
                $banner->caption = $request['title'];
                $banner->sub_caption1 = $request['caption2'];
                $banner->btn = $request['button'];
                $banner->btn_target = $request['target'];
                $banner->update();

                return redirect()->back()->with('status', 'Image updated');
            }
        }
    }
    public function postGalStatus(Request $request){
        $id = $request['id'];
        $featured = $request['featured'];
        if ($featured == 'on'){
            $status = '1';
            $check = DB::table('homes')->where([
                ['type', '=', 'gallery'],
                ['status', '=', '1']
            ])->count();
            if($check < 8){
                $update = Home::find($id);
                $update->status = $status;
                $update->update();
                return redirect()->back()->with('status', 'Successfully updated!');
            }else {
                return redirect()->back()->with('status2', 'Limit exceeded!');
            }

        }else{
            $status = '0';
            $update = Home::find($id);
            $update->status = $status;
            $update->update();
            return redirect()->back()->with('status', 'Successfully updated!');
        }
    }
    public function postBannerStatus(Request $request){
        $id = $request['id'];
        $featured = $request['featured'];
        if ($featured == 'on'){
            $status = '1';
            $check = DB::table('homes')->where([
                ['type', '=', 'banner'],
                ['status', '=', '1']
            ])->count();
            if($check < 6){
                $update = Home::find($id);
                $update->status = $status;
                $update->update();
                return redirect()->back()->with('status', 'Successfully updated!');
            }else {
                return redirect()->back()->with('status2', 'Limit exceeded!');
            }

        }else{
            $status = '0';
            $update = Home::find($id);
            $update->status = $status;
            $update->update();
            return redirect()->back()->with('status', 'Successfully updated!');
        }
    }
    public function getUserAccountHome(){

        $query = DB::table('users')->where('id', Auth::id())->first();

        return view('admin.admin-account', [
            'user' => $query
        ]);
    }
    public function getUserAccountEditdetails(){
        $query = DB::table('users')->where('id', Auth::id())->first();

        return view('admin.admin-edit-account', [
            'user' => $query
        ]);
    }
    public function getUserAccountUpdatepass(){

        return view('admin.admin-update-pass');
    }
    public function postEditUserAcct(Request $request){
        if (isset($request['name'])){
            $this->validate($request, [
                'name' => 'required|max:120'
            ]);
            $user = User::find(Auth::id());
            $user->name = $request['name'];
            $user->update();
            return redirect()->back()->with('status', 'Account successfully updated');
        }elseif(isset($request['email'])){
            $this->validate($request, [
                'email' => 'required|email|unique:users'
            ]);

            $user = User::find(Auth::id());
            $user->email = $request['email'];
            $user->update();

            return redirect()->back()->with('status', 'Account successfully updated');
        }

    }
    public function postEditUserPass(Request $request){
        $this->validate($request, [
            'currentPassword' => 'required',
            'newPassword' => 'required|confirmed|min:4'
        ]);
        $oldpass = $request['currentPassword'];
        $user = DB::table('users')->where('id', Auth::id())->first();
        if (Auth::attempt(['id' => Auth::id(), 'password' => $oldpass])) {
            $update = User::find(Auth::id());
            $update->password = bcrypt($request['newPassword']);
            $update->update();
            return redirect()->back()->with('status', 'Password successfully updated');
        }else{
            return redirect()->back()->with('status2', 'Incorrect current password');
        }
    }
    public function getHomepageSetupSec1(){

        $sections = DB::table('options')->where('type', 'section')->get();
        $section1 = DB::table('homes')->where('type', 'servicesHead')->first();
        $services = DB::table('homes')->where('type', 'servicesBody')->get();
        return view('admin.section1', [
            'options' => $sections,
            'servicesHead' => $section1,
            'services' => $services
        ]);
    }
    public function getHomepageSetupSec2(Request $request){
        $sections = DB::table('options')->where('type', 'section')->get();
        $section2 = DB::table('homes')->where('type', 'AboutUsHead')->first();
        $aboutImg = DB::table('homes')->where('type', 'aboutImg')->limit(3)->get();
        $who_we_are = DB::table('homes')->where('type', 'WhoWeAre')->first();
        $vision = DB::table('homes')->where('type', 'Vision')->first();
        $mission = DB::table('homes')->where('type', 'Mission')->first();
        $core_values = DB::table('homes')->where('type', 'CoreValues')->get();
        return view('admin.section2', [
            'options' => $sections,
            'aboutHead' => $section2,
            'aboutImg' => $aboutImg,
            'WhoWeAre' => $who_we_are,
            'vision' => $vision,
            'mission' => $mission,
            'coreValues' => $core_values
        ]);
    }
    public function getHomepageSetupSec3(Request $request){
        $sections = DB::table('options')->where('type', 'section')->get();
        $whychooseHead = DB::table('homes')->where('type', 'WhyChooseUsHead')->first();
        $galleryHead = DB::table('homes')->where('type', 'GalleryHead')->first();
        $whychoose = DB::table('homes')->where('type', 'WhyChooseUsBody')->limit(3)->get();
        return view('admin.section3', [
            'options' => $sections,
            'whychooseHead' => $whychooseHead,
            'galleryHead' => $galleryHead,
            'WhyChooseBody' => $whychoose
        ]);

    }
    public function getHomepageSetupSecFooter(Request $request){
        $sections = DB::table('options')->where('type', 'section')->get();
        $address = DB::table('homes')->where('type', 'Address')->first();
        $email = DB::table('homes')->where('type', 'email')->first();
        $phone = DB::table('homes')->where('type', 'Phone')->get();
        $quickLinks = DB::table('homes')->where('type', 'QuickLinks')->get();

        return view('admin.section-footer', [
            'options' => $sections,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'quickLinks' => $quickLinks
        ]);
    }
    public function getUserManagement(){

        $users = DB::table('users')->orderBy('name')->paginate('8');

        return view('admin.user-management', [
            'users' => $users
        ]);
    }
    public function getUserCreate(){

        return view('admin.user-create');
    }
    public function getEditUser($id){
        $user = DB::table('users')->where('id', $id)->first();
        if ($user->user_role == '3'){
            $user = null;
        }
        return view('admin.user-edit', [
            'user' => $user
        ]);
    }
    public function postSections(Request $request){
        $this->validate($request, [
            'section' => 'required',
        ]);
        $file = $request->file('sectionImage');
        if($file){
            $rawfile = $_FILES['sectionImage']["name"];
            $split = explode(".", $rawfile);
            $fileExt = end($split);
            $imgFinaltitle = 'section_image';
            $filename = $imgFinaltitle . '_'. rand(1,999999999) . '.'. $fileExt;
            Storage::disk('public')->put($filename, File::get($file));
            $section = new Home();
            $section->type = $request['section'];
            $section->title = $request['title'];
            $section->image = $filename;
            $section->sub_title1 = $request['subTitle1'];
            $section->sub_title2 = $request['subTitle2'];
            $section->sub_title3 = $request['subTitle3'];
            $section->body = $request['mainBody'];
            $section->btn = $request['button'];
            $section->btn_target = $request['buttonTarget'];
            $section->icon = $request['icon'];
            $section->save();
            return redirect()->back()->with('status', 'Section uploaded!');
        }else{
            $section = new Home();
            $section->type = $request['section'];
            $section->title = $request['title'];
            $section->sub_title1 = $request['subTitle1'];
            $section->sub_title2 = $request['subTitle2'];
            $section->sub_title3 = $request['subTitle3'];
            $section->body = $request['mainBody'];
            $section->btn = $request['button'];
            $section->btn_target = $request['buttonTarget'];
            $section->icon = $request['icon'];
            $section->save();
            return redirect()->back()->with('status', 'Section uploaded!');
        }

    }
    public function postSectionsHead(Request $request){
        if($request['name'] == 'servicesHead'){
            $id = $request['id'];
            $update = Home::find($id);
            $update->title = $request['title'];
            $update->sub_title1 = $request['subTitle1'];
            $update->sub_title2 = $request['subTitle2'];
            if ($request['body']){
                $update->body = $request['body'];
            }
            $update->update();
            return redirect()->back()->with('status', 'Updated!');
        }elseif ($request['name'] == 'servicesBody'){
            $id = $request['id'];
            $update = Home::find($id);
            $update->btn = $request['input1'];
            $update->icon = $request['input2'];
            if ($request['input3']){
                $update->btn_target = $request['input3'];
            }
            if ($request['title']){
                $update->title = $request['title'];
            }
            if ($request['body']){
                $update->body = $request['body'];
            }
            $update->update();
            $file = $request->file('sectionImage');
            if($file){
                $rawfile = $_FILES['sectionImage']["name"];
                $split = explode(".", $rawfile);
                $fileExt = end($split);
                $imgFinaltitle = 'section_image';
                $filename = $imgFinaltitle . '_'. rand(1,999999999) . '.'. $fileExt;
                $old_image = $request['image'];
                $update = Home::find($id);
                $update->image = $filename;
                $update->update();

                Storage::disk('public')->delete($old_image);
                Storage::disk('public')->put($filename, File::get($file));
                return redirect()->back()->with('status', 'Section uploaded!');
            }
            return redirect()->back()->with('status', 'Updated!');
        }
        else{
            return redirect()->back()->with('status2', 'Error!');
        }
    }
    public function postDelHmSection(Request $request){
        $id = $request['id'];
        $del = Home::find($id);
        $del->delete();
        return redirect()->back()->with('status', 'Item deleted!');
    }
    public function getNewsletter(Request $request){

        $newsletter = DB::table('newsletters')->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.newsletter', [
            'newsletter' => $newsletter
        ]);
    }
    public function postDelNewsletter(Request $request){
        //check if authorised to del
        $id = $request['inputId'];
        $del = Newsletter::find($id);
        $del->delete();
        return redirect()->back()->with('status', 'successfully deleted!');
    }
}
