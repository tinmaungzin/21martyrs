<?php


namespace App\Utility;


use Illuminate\Support\Facades\DB;

class MigrationUtility
{
    public static function modifyEnum($table_name, $col_name, array $enums)
    {
        if (config('database.default') === 'pgsql') {
            $enumStr = join(", ", array_map(function ($enum) {
                if (is_null($enum)) {
                    return "NULL::CHARACTER VARYING";
                }
                return "'{$enum}'::CHARACTER VARYING";
            }, $enums));
            DB::transaction(function () use ($table_name, $col_name, $enumStr) {
                DB::statement("ALTER TABLE " . $table_name . " DROP CONSTRAINT IF EXISTS " . $table_name . "_" . $col_name . "_check");
                DB::statement("ALTER TABLE " . $table_name . " ADD CONSTRAINT " . $table_name .
                    "_{$col_name}_check CHECK ({$col_name}::TEXT = ANY (ARRAY[{$enumStr}]::TEXT[]))");
            });
        } else {
            $enumStr = join(',', ArrayUtility::compact(array_map(function ($enum) {
                if (is_null($enum)) {
                    return null;
                }
                return "'{$enum}'";
            }, $enums)));
            DB::statement("ALTER TABLE " . $table_name . " MODIFY COLUMN {$col_name} ENUM({$enumStr}) NULL");
        }
    }


}
