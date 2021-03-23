<?php

namespace App\Imports;

use App\Models\Admin;
use App\Models\Post;
use App\Models\State;
use App\Utility\ArrayUtility;
use App\Utility\FileUtility;
use App\Utility\ImageModule;
use App\Utility\StringUtility;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
     * @var array
     */
    private $files;
    /**
     * @var string
     */
    private $status;

    public function __construct(string $img_dir, string $status)
    {
//        dd(Storage::disk('local')->url(self::IMG_DIR));
        $this->files = FileUtility::list_dir($img_dir);
        $this->status = $status;
        if (!in_array($status, ['death', 'detained'])) {
            throw new \InvalidArgumentException('Status not correct.');
        }
    }

    protected function transformRow($row, $states)
    {
        $transformedRow = $row;
        if (is_null($row['region'])) {
            $transformedRow['state_id'] = null;
        } else {
            $state = Arr::first($states, function ($state) use ($row) {
                return trim(strtolower($state->name)) == trim(strtolower($row['region']));
            });
            $transformedRow['state_id'] = $state->id;
        }
        $transformedRow['age'] = is_numeric($row['age']) ? (int)$row['age'] : null;
        $transformedRow['address'] = $row['township'];
        $transformedRow['gender'] = StringUtility::isEmpty(trim($row['gender'])) ? 'other' : strtolower($row['gender']);
        $transformedRow['occupation'] = strtolower($row['occupation']);
        $transformedRow['status'] = $this->status == 'death' ? 'dead' : (strtolower($row['status']) == 'still detained' ? 'detained' : 'released');
        $transformedRow['released_date'] = $this->status == 'death' ? null :
            (strtolower($row['released_date']) == 'n/a' ? null : Date::excelToDateTimeObject($row['released_date']));
        $transformedRow['detained_date'] = Date::excelToDateTimeObject($transformedRow['detained_date']);
        $transformedRow['name'] = $row['name'];
        ArrayUtility::except($transformedRow, ['no', 'photo_of_arrestee_photo_will_be_used_for_good_purposes_only', "", 'region', 'township']);
        return $transformedRow;
    }

    public function collection(Collection $rows)
    {
        DB::transaction(function () use ($rows) {
            $transformedRows = [];
            $admin = Admin::all()->first();
            if (is_null($admin)) {
                /** @noinspection PhpUnhandledExceptionInspection */
                throw new Exception("No admin. Seed admin table first.");
            }
            $states = State::all();
            foreach ($rows as $row) {
                if (is_null($row['name'])) {
                    continue;
                }
                $file = Arr::first($this->files, function ($file_path) use ($row) {
                    $matchedStr = Str::of($file_path)->match('/\d+/');
                    return strval($row['no']) == $matchedStr;
                });
                if (is_null($file)) {
                    $row['profile_url'] = null;
                } else {
                    $content = File::get($file);
                    $file_name = 'profiles/' . $row['name'] . '-' . Str::uuid() . '.' . FileUtility::get_ext_from_file_name($file);
                    $row['profile_url'] = ImageModule::upload($file_name, $content);
                }
                try {
                    $transformedRow = self::transformRow($row, $states);
                    $transformedRow['admin_id'] = $admin->id;
                    unset($transformedRow['no']);
                    array_push($transformedRows, $transformedRow->toArray());
                    Post::create($transformedRow->toArray());
                } catch (Exception $e) {
                    var_dump('exception row', $row);
                    /** @noinspection PhpUnhandledExceptionInspection */
                    throw $e;
                }
//
            }
        });
//        dd($transformedRows);
//        return Post::insert($transformedRows);
    }
}
