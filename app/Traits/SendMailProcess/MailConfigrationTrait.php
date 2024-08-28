<?php
namespace Modules\Setting\Traits\SendMailProcess;

use Illuminate\Support\Facades\File;
use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

trait MailConfigrationTrait
{
   //==================================================================================================
   public function updateMailConfigurationFromSetting(){
      $settings = Setting::first();
      $mailConfiguration = $settings->mail_configuration;

      $this->updateMailConfigurationInEnv($mailConfiguration);
      return $this->setMailConfigurationToConfig($mailConfiguration);
   }
   //==================================================================================================
   protected function setMailConfigurationToConfig(array $mailConfiguration){
      Config::set('mail.host', $mailConfiguration['mail_host'] ?? env('MAIL_HOST'));
      Config::set('mail.port', $mailConfiguration['mail_port'] ?? env('MAIL_PORT'));
      Config::set('mail.username', $mailConfiguration['mail_username'] ?? env('MAIL_USERNAME'));
      Config::set('mail.password', $mailConfiguration['mail_password'] ?? env('MAIL_PASSWORD'));
      Config::set('mail.encryption', $mailConfiguration['mail_encryption'] ?? env('MAIL_ENCRYPTION'));
      Config::set('mail.from.address', $mailConfiguration['mail_from_address'] ?? env('MAIL_FROM_ADDRESS'));
      Config::set('mail.from.name', $mailConfiguration['mail_from_name'] ?? env('MAIL_FROM_NAME'));
      return Config::get('mail');
   }
   //==================================================================================================
   protected function updateMailConfigurationInEnv(array $mailConfiguration){
      $envFile = base_path('.env');
      if (File::exists($envFile))
      {
         $envContents = File::get($envFile);
         $envContents = $this->replaceMailConfigrationInEnv($envContents, $mailConfiguration);
         File::put($envFile, $envContents);
      }
      Artisan::call('config:clear');
      Artisan::call('cache:clear');
   }
   //==================================================================================================
   protected function replaceMailConfigrationInEnv($envContents, array $mailConfiguration){
      return preg_replace(
         [
               '/MAIL_MAILER=.*/',
               '/MAIL_HOST=.*/',
               '/MAIL_PORT=.*/',
               '/MAIL_USERNAME=.*/',
               '/MAIL_PASSWORD=.*/',
               '/MAIL_ENCRYPTION=.*/',
               '/MAIL_FROM_ADDRESS=.*/',
               '/MAIL_FROM_NAME=.*/',
         ],
         [
               'MAIL_MAILER=smtp',
               'MAIL_HOST=' . ($mailConfiguration['mail_host'] ?? env('MAIL_HOST')),
               'MAIL_PORT=' . ($mailConfiguration['mail_port'] ?? env('MAIL_PORT')),
               'MAIL_USERNAME=' . ($mailConfiguration['mail_username'] ?? env('MAIL_USERNAME')),
               'MAIL_PASSWORD=' . ($mailConfiguration['mail_password'] ?? env('MAIL_PASSWORD')),
               'MAIL_ENCRYPTION=' . ($mailConfiguration['mail_encryption'] ?? env('MAIL_ENCRYPTION')),
               'MAIL_FROM_ADDRESS=' . ($mailConfiguration['mail_from_address'] ?? env('MAIL_FROM_ADDRESS')),
               'MAIL_FROM_NAME=' . ($mailConfiguration['mail_from_name'] ?? env('MAIL_FROM_NAME')),
         ],
         $envContents
      );
   }
   //==================================================================================================
}