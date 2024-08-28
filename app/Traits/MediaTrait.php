<?php
namespace Modules\Setting\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait MediaTrait
{
   public function StoreMediaWithMediaLibrary($request,$model_data,$media_name_request,$collection_name){
      $file    = $request->file($media_name_request);
      Log::info('inside store media line 12');
      Log::info($model_data);
      Log::info($file);

      return   $model_data->addMedia($file)->toMediaCollection($collection_name);
   }
   #==========================================================================================================#
   public function UpdateMediaWithMediaLibrary($request,$media_name_request,$new_image_name,$model_name,$model_id,$model_collection_name){

      //fetch image name from uploaded image
      // $new_image_without_extension = pathinfo($new_image_name->getClientOriginalName(), PATHINFO_FILENAME) ; 
      $new_image_with_extension = $new_image_name->getClientOriginalName(); 

      # Check File Exist Media With MediaLibrary
      $check_image_exist = $this->CheckFileExistMediaWithMediaLibrary($model_name,$model_id,$model_collection_name);

      if(isset($check_image_exist)){
         if( ($check_image_exist->file_name == $new_image_with_extension)){
            $update=0;
            return null;
         }else{
            $update=1;
            #delete image from media table  and from disk 
            $this->DeleteMediaWithMediaLibrary($check_image_exist->id);
         }
      }else{
         $update=1;
      }
      #==========================================================================================================#
      if($update==1){
         #store new image in db and generate new image on media disk
         $model=$model_name::find($model_id);
         if($model){
            return  $this->StoreMediaWithMediaLibrary($request,$model,$media_name_request,$model_collection_name);
         }
      }
   }
   #==========================================================================================================#
   public function CheckFileExistMediaWithMediaLibrary($model_name,$model_id,$model_collection_name){
      return DB::table('media')->where([
         ['model_type'      , $model_name],
         ['model_id'        , $model_id],
         ['collection_name' , $model_collection_name],
      ])->first();
   }
   #==========================================================================================================#
   public function DeleteMediaWithMediaLibrary($media_id){
      $media=Media::find($media_id);
      $media->delete(); // function media to delete image from media table  and from disk 
      return $media;
   }

   #===============================================multi=============================================================#
   public function StoreMultiMediaWithMediaLibrary($model,$request, $media_input_name,$collection_name){
      foreach ($request->file($media_input_name, []) as $key => $file){
         $model->addMedia($file)->toMediaCollection($collection_name);
      }
   }
   #==========================================================================================================#
   public function CheckMultiFileExistMediaWithMediaLibrary($model_name,$model_id,$model_collection_name){
      return $CheckImageExist =DB::table('media')->where(
         [
            ['model_type'      , $model_name],
            ['model_id'        , $model_id],
            ['collection_name' , $model_collection_name],
         ])->get();
   }
   #==========================================================================================================#
   public function DeleteMultiMedia($media_ids){
      $media = Media::whereIn('uuid', $media_ids)->delete();
      return $media;
   }
   #==========================================================================================================#
   public function getImageAttribute(){
      $model = __CLASS__;
      $photo = $model::getFirstMediaUrl('main_image','site');
      if (! $photo) {
         return asset('images/product.jpg');
      }
      return $photo;
   }
   #==========================================================================================================#
   public function getSingleDetailImageAttribute(){
      $model = __CLASS__;
      $photo = $model::getFirstMediaUrl('main_image','single_details');
      if (! $photo) {
         return asset('images/product.jpg');
      }
      return $photo;
   }
   #==========================================================================================================#
   
}