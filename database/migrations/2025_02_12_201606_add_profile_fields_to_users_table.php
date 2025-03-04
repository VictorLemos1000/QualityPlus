<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('birth_date')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('phone')->nullable();
            $table->text('about')->nullable();
            $table->string('profile_image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['birth_date', 'contact_email', 'phone', 'about', 'profile_image']);
        });
    }
};
