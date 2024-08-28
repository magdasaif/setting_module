<?php

namespace Modules\Setting\Traits;

trait HasTranslate
{
    //=========================================================================================================
    public function getNameAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->name_en;
        } else {
            return $this->name_ar;
        }
    }
    //=========================================================================================================
    public function getDescriptionAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->description_en;
        } else {
            return $this->description_ar;
        }
    }
    //=========================================================================================================
    public function getTitleAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->title_en;
        } else {
            return $this->title_ar;
        }
    }
    //=========================================================================================================
    public function getContentAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->content_en;
        } else {
            return $this->content_ar;
        }
    }
    //=========================================================================================================
    public function getLocationAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->location_en;
        } else {
            return $this->location_ar;
        }
    }
    //=========================================================================================================
    public function getBioAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->bio_en;
        } else {
            return $this->bio_ar;
        }
    }
    //=========================================================================================================
    public function getValueAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            // return $this->value_en;
            return ($this->value_en)['value'];
        } else {
            // return $this->value_ar;
            return ($this->value_ar)['value'];
        }
    }
    //=========================================================================================================
    public function getSiteNameAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->site_name_en;
        } else {
            return $this->site_name_ar;
        }
    }
    //=========================================================================================================
    public function getAppsHintAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->apps_en_hint;
        } else {
            return $this->apps_ar_hint;
        }
    }
    //=========================================================================================================
    public function getAddressAttribute(){
        if (app('request')->header('locale') === 'en' || app()->getLocale() === 'en') {
            return $this->address_en;
        } else {
            return $this->address_ar;
        }
    }
}
