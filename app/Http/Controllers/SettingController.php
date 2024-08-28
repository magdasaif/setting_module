<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Traits\MediaTrait;
use Modules\Setting\Traits\SettingTrait;
use Modules\Setting\Traits\SendMailProcess\MailConfigrationTrait;

class SettingController extends Controller
{
    use MediaTrait,SettingTrait,MailConfigrationTrait;
    //==================================================================================================
    private $setting;
    //==================================================================================================
    public function __construct(){
        $this->middleware('auth');
        $this->setting = Setting::first();
    }
    //==================================================================================================
    public function index(){
        return view('setting::index');
    }
    //==================================================================================================
    public function create(){
        return view('setting::create');
    }
    //==================================================================================================
    public function store(Request $request){
        //
    }
    //==================================================================================================
    public function show($id){
        return view('setting::show');
    }
    //==================================================================================================
    public function edit($id){
        // return view('setting::edit');
        return view('setting::settings.edit', ['setting' => $this->setting]);
    }
    //==================================================================================================
    // public function update(Request $request, $id){
    public function update(Request $request){
        DB::beginTransaction();
        try{
            // dd($request->all());
            //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            $this->setting->update($request->input());
            //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            #---mailConfiguration---#
            $mailConfiguration=$this->prepare_mail_configration_request($request);
            //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            #---social---#
            $social =$this->prepare_social_request($request);
            //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            $exception_array=['mail_mailer','mail_host','mail_port','mail_username','mail_password','mail_encryption','mail_from_address','mail_from_name','facebook', 'twitter', 'instagram'];
            $requestData = $request->except($exception_array);
            //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            #---update---#
            $this->setting->update($requestData);
            $this->setting->mail_configuration = $mailConfiguration;
            $this->setting->social = $social;
            $this->setting->save();
            //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            if ($request->hasFile('logo')) {
                //****************************************************************************************** */
                // $this->UpdateMediaWithMediaLibrary($request,'logo',$request->logo,'App\Models\Setting',1,'logo');
                $this->UpdateMediaWithMediaLibrary($request,'logo',$request->logo,'Modules\Setting\Entities\Setting',1,'logo');
                //****************************************************************************************** */
            }
            //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            #----SetMailConfigurationFromSettingInConfig---#
            $SetMailConfigurationFromSettingInConfig = $this->updateMailConfigurationFromSetting();
            //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
            #---response---#  
            DB::commit();      
            return redirect()->route('setting::settings.edit')->with('success', 'تم تحديث الاعدادات بنجاح');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('setting::settings.edit')->with('errors',$e->getMessage());
        }
    }
    // }
    //==================================================================================================
    public function destroy($id){
        //
    }
    //==================================================================================================
}
