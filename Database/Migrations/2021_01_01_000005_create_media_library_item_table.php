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
class CreateMediaLibraryItemTable extends XotBaseMigration
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
                $table->increments('id');
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('order_column')) {
                    $table->integer('order_column')->nullable();
                }
            }
        );
    }
}
