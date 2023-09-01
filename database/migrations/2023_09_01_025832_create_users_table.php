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
            $table->string('fullname', 45);
            $table->string('document', 18);
            $table->string('email', 45);
            $table->string('password', 32);
            $table->timestamps();

            $table->unique('email');
            $table->unique('cnpj');
            $table->unique('cpf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique');
            $table->dropUnique('users_cnpj_unique');
            $table->dropUnique('users_cpf_unique');
        });
        Schema::dropIfExists('users');
    }
}
