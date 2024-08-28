<?php
namespace Modules\Setting\Traits;

trait SettingTrait
{
    #===================================================================#
    public function prepare_mail_configration_request($request){
        $mailConfiguration = [
            'mail_mailer'       => $request->input('mail_mailer'),
            'mail_host'         => $request->input('mail_host'),
            'mail_port'         => $request->input('mail_port'),
            'mail_username'     => $request->input('mail_username'),
            'mail_password'     => $request->input('mail_password'),
            'mail_encryption'   => $request->input('mail_encryption'),
            'mail_from_address' => $request->input('mail_from_address'),
            'mail_from_name'    => $request->input('mail_from_name')
        ];
        return  $mailConfiguration;
    }
    #===================================================================#
    public function prepare_social_request($request){
        $social = [
            'facebook'  => [$request->input('facebook'), 'fab fa-facebook'],
            'twitter'   => [$request->input('twitter'), 'fab fa-twitter'],
            'instagram' => [$request->input('instagram'), 'fab fa-instagram'],
        ];
        return $social;
    }
}
