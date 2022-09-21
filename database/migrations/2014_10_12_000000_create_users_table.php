<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('isadmin')->nullable()->comment('ระดับผู้ใช้งาน');
            $table->string('avatar')->nullable()->comment('ลิงก์ภาพสมาชิก');
            $table->string('depcode')->nullable()->comment('รหัสหน่วยงาน');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                [
                    'name'=> 'admin',
                    'email'=> 'admin@local.com',
                    'password'=> '$2y$10$IEPPoaUaBVC.vuK7mKA4SedqN.rVcXkNBuCgnAdo4TjwzD0fxWSgi',
                    'isadmin'=> '0',
                    'created_at'=> date("Y-m-d H:i:s"),
                    'updated_at'=> date("Y-m-d H:i:s"),
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
