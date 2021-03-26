<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyInformantInfoInPendingPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pending_posts', function (Blueprint $table) {
            $table->string('informant_name')->nullable()->change();
            $table->string('informant_phone')->nullable()->change();
            $table->string('informant_association_with_victim')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pending_posts', function (Blueprint $table) {
            //
        });
    }
}
