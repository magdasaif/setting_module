<?php

use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('site_name_ar');
            $table->string('site_name_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('apps_ar_hint')->nullable();
            $table->string('apps_en_hint')->nullable();

            $table->json('social')->nullable();
            $table->json('mail_configuration')->nullable();
            
            $table->string('address_ar');
            $table->string('address_en');

            // $table->text('facebook')->nullable();
            // $table->text('twitter')->nullable();
            // $table->text('instagram')->nullable();
            // $table->string('android_app')->nullable();
            // $table->string('ios_app')->nullable();
            // $table->string('android_version')->nullable();
            // $table->string('ios_version')->nullable();
            // $table->float('user_point_value')->default(1);
            // $table->float('merchant_point_value')->default(1);
            // $table->float('max_sales')->default(1);
            $table->timestamps();
        });
        // factory(Setting::class)->create();
        Setting::factory()->create();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
