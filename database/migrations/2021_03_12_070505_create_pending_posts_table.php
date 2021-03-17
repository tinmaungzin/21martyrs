<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('profile_url');
            $table->enum('gender',['male','female','others']);
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->enum('status',['dead','detained']);
            $table->string('prison')->nullable();
            $table->date('released_date')->nullable();
            $table->string('reason_of_dead')->nullable();
            $table->string('informant_name');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('informant_association_with_victim');
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
        Schema::dropIfExists('pending_posts');
    }
}
