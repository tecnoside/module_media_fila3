<?php
/**
 * Syntax error or access violation: 1118 Row size too large. The maximum row size for the used table type, not counting BLOBs, is 8126. This includes storage overhead, check the manual. You have to change some columns to TEXT or BLOBs (SQL: alter table `places` add `address` text null).
 */

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ----- models -----
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateVideosTable.
 */
class CreateMediaLibraryItemsTable extends XotBaseMigration
{
    /**
     * i don't write table name, it take from Model, model is singular of this class wit.
     *
     * @return void
     */
    public function up()
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->id();

                // $table->foreignId('uploaded_by_user_id')
                //    ->nullable()
                // ->constrained('users')
                // ->nullOnDelete()
                // ->cascadeOnUpdate()

                $table->foreignUuid('uploaded_by_user_id')->nullable();
                $table->string('caption')->nullable();
                $table->string('alt_text')->nullable();
                $table->integer('order_column')->nullable();
                $this->timestamps($table);
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('order_column')) {
                    $table->integer('order_column')->nullable();
                }
                if (! $this->hasColumn('folder_id')) {
<<<<<<< HEAD
<<<<<<< HEAD:Database/Migrations/2021_01_01_000006_create_media_library_items_table.php
                    $table->foreignId('folder_id')->nullable()->after('alt_text');
                    // ->constrained('filament_media_library_folders');
=======
                    $table->foreignId('folder_id')->nullable()->after('alt_text')
                        // ->constrained('filament_media_library_folders');
                    ;
>>>>>>> 6de5f29 (.):Database/Migrations/2021_01_01_000005_create_media_library_items_table.php
=======
                    $table->foreignId('folder_id')->nullable()->after('alt_text');
                    // ->constrained('filament_media_library_folders');
>>>>>>> 59c1db1 (Dusting)
                }
            }
        );
    }
}
