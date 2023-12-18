<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Smtp;
use App\Models\WebsiteSetting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // seo setting page start
    public function seo(){
        $data = Seo::first();
        return view('admin.settings.seo',compact('data'));
    }

    // seo setting update
    public function seoUpdate(Request $request){
        $data = Seo::find($request->id);

        $data->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_verification' => $request->google_verification,
            'alexa_verification' => $request->alexa_verification,
            'google_analytics' => $request->google_analytics,
            'google_adsense' => $request->google_adsense,
        ]);

        toastr()->success('SEO update successful!');
        return redirect()->back();
    }

    // smtp setting page start
    public function smpt(){
        $smtp = Smtp::first();
        return view('admin.settings.smtp',compact('smtp'));
    }
    // smtp setting update
    public function smtpUpdate(Request $request){
        $data = Smtp::find($request->id);

        $data->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'user_name' => $request->user_name,
            'password' => $request->password,
        ]);

        toastr()->success('SMTP update successful!');
        return redirect()->back();
    }

    // website setting
    public function website(){
        $data = WebsiteSetting::first();
        return view('admin.settings.websiteSetting',compact('data'));
    }
    // website setting update
    public function websiteUpdate(Request $request){
        $data = WebsiteSetting::find($request->id);

        $data->update([
            'currency' => $request->currency,
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'main_email' => $request->main_email,
            'support_email' => $request->support_email,
            'address' => $request->address,
            'logo' => $request->logo,
            'favicon' => $request->favicon,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
        ]);

        toastr()->success('Website update successful!');
        return redirect()->back();
    }
}
