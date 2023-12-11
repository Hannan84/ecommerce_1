<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Smtp;

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
}
