<?php

use App\Utility\Constants;
use App\Utility\MigrationUtility;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ModifyStatusAndOccupationsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        foreach (['posts', 'pending_posts'] as $table_name) {
            if (config('database.default') == 'pgsql') {
                DB::statement("ALTER TABLE {$table_name} DROP CONSTRAINT IF EXISTS {$table_name}_occupation_check");
            }
            MigrationUtility::modifyEnum($table_name, 'status', Constants::POSTS_STATUS);
            Schema::table($table_name, function (Blueprint $table) {
                $table->string('occupation')->default('unknown')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
