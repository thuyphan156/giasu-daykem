<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->integer('gender')->nullable();
            $table->integer('voice')->nullable();
            $table->date('birthday')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('avatar')->nullable();
            $table->text('certificate_img')->nullable();
            $table->text('classes')->nullable();
            $table->text('subjects')->nullable();
            $table->bigInteger('province_id')->nullable()->unsigned()->index();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->text('districts')->nullable();
            $table->text('times')->nullable();
            $table->integer('number_sessions')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('role')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
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
}
