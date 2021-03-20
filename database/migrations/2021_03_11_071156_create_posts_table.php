<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('comment')->nullable();
            $table->double('age');
            $table->string('profile_url')->nullable();
            $table->enum('gender',['Male','Female','Other']);
            $table->enum('occupation',['Student','CDM staff','Government Official','Political Party Member','Journalist','Civilian','Other']);
            $table->string('organization_name');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->enum('status',['dead','detained']);
            $table->string('prison')->nullable();
            $table->date('detained_date');
            $table->enum('reason_of_dead',['Gunshot','Beaten','Other'])->nullable();
            $table->enum('reason_of_arrest',['Protest','Bystand','Other'])->nullable();
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
