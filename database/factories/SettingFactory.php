<?php
namespace Modules\Setting\Database\Factories;

use Modules\Setting\Entities\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;
    public function definition(){
        return [
            'site_name_ar'      => 'مقاولات',
            'site_name_en'      => 'Real states',
            'email'             => 'info@realstates.com',
            'phone'             => '0123456789',
            'fax'               => '0123456789',
            'description_ar'    => 'مقاولات',
            'description_en'    => 'Real states',
            'apps_ar_hint'      => 'حمل تطبيق مقاولات واستمتع باقوي الخصومات',
            'apps_en_hint'      => 'Download Real states app and enjoy discounts',
            'address_ar'        => 'الفيوم',
            'address_en'        => 'fayoum',
            // 'mail_configuration','social'
        ];
    }
};
