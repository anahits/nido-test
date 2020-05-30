<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id_employee');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('company_id')->unsigned()->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id_company')
                ->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // to avoid foreign dependencies
        Schema::dropIfExists('employees');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
