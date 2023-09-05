<?php
/**
 * @see https://github.com/spatie/laravel-medialibrary/blob/main/database/migrations/create_media_table.php.stub
 */

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ----- models -----
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateImagesTable.
 */
class CreateFilamentMediaLibraryModelTable extends XotBaseMigration
{
    /**
     * i don't write table name, it take from Model, model is singular of this class wit.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $blueprint): void {
                $blueprint->bigIncrements('id');

                $blueprint->morphs('model');
                $blueprint->string('media_library_item_id');
                $blueprint->text('note');
                $blueprint->nullableTimestamps();
                // ----------------------------------------------------------
                $blueprint->string('created_by')->nullable();
                $blueprint->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --

        $this->tableUpdate(
            function (Blueprint $blueprint): void {
                if (! $this->hasColumn('media_library_item_id') && $this->hasColumn('media_library_id')) {
                    $blueprint->renameColumn('media_library_id', 'media_library_item_id');
                }
            }
        );
    }
}
