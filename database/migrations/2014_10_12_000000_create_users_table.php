<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Thực hiện migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->boolean('active')->default(false); // Giá trị mặc định là false
            $table->timestamps();
        });
    }
    

    /**
     * Đảo ngược migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
