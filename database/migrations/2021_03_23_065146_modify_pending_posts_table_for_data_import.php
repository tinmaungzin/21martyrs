<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPendingPostsTableForDataImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pending_posts', function (Blueprint $table) {
            $table->string('address', 500)->default("")->nullable(true)->after('state_id');
            $table->text('reason_of_dead')->default('unknown')->change();
            $table->text('reason_of_arrest')->default('unknown')->change();
            $table->dateTime('released_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('pending_posts', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('released_date');
        });
    }
}
