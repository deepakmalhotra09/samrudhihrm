<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCaptchaColumnInSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('google_recaptcha_status')->default(false);
            $table->text('google_recaptcha_key')->nullable();
            $table->text('google_recaptcha_secret')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['google_recaptcha_status']);
            $table->dropColumn(['google_recaptcha_key']);
            $table->dropColumn(['google_recaptcha_secret']);
        });
    }
}
