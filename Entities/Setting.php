<?php

namespace Modules\Setting\Entities;

use Spatie\MediaLibrary\HasMedia;
use Modules\Setting\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Setting\Traits\HasTranslate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use HasTranslate,HasFactory,MediaTrait,InteractsWithMedia;
    #==============================================================================#
    protected $fillable = ['site_name_ar', 'site_name_en', 'description_ar', 'description_en', 'phone','email',
        'fax', 'mail_configuration','social', 'apps_ar_hint', 'apps_en_hint','address_ar','address_en'
    ];
    #==============================================================================#
     protected $casts = [
        'mail_configuration' => 'array',
        'social'             => 'array',
    ];
    #==============================================================================#
    public function registerMediaConversions(Media $media = null): void{
        $this->addMediaConversion('site')
            ->format('webp')
            ->width(200)
            ->height(120);

        $this->addMediaConversion('app')
            ->format('webp')
            ->width(90)
            ->height(90);
    }
    #==============================================================================#
    public function getLogoAttribute(){
        $model = __CLASS__;
        $photo = $model::getFirstMediaUrl('logo','site');
        return $photo;
    }
    #==============================================================================#
    protected static function newFactory()
    {
        // return \Modules\Setting\Database\factories\SettingFactory::new();
    }
}