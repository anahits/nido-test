<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id_company');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('logo');
            $table->string('website');
            $table->integer('company_id')->unsigned()->nullable();
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
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('companies_company_id_foreign');
        });
        Schema::dropIfExists('companies');

    }
}
