<?php
/**
 * Syntax error or access violation: 1118 Row size too large. The maximum row size for the used table type, not counting BLOBs, is 8126. This includes storage overhead, check the manual. You have to change some columns to TEXT or BLOBs (SQL: alter table `places` add `address` text null).
 */

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
//----- models -----
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateVideosTable.
 */
class CreateVideosTable extends XotBaseMigration {
    /**
     * i don't write table name, it take from Model, model is singular of this class wit
     *
     * @return void
     */
    public function up() {
        //-- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('original_name');
                $table->string('disk');
                $table->string('path');
                $table->datetime('converted_for_downloading_at')->nullable();
                $table->datetime('converted_for_streaming_at')->nullable();
                //----------------------------------------------------------
                $table->boolean('adult')->nullable();
                $table->string('backdrop_path')->nullable();
                $table->string('original_language', 3)->nullable();
                $table->string('original_title')->nullable();
                $table->text('overview')->nullable();
                $table->decimal('popularity', 10, 3)->nullable();
                $table->string('poster_path')->nullable();
                $table->dateTime('release_date')->nullable();
                //$table->string('title')->nullable();
                $table->boolean('video')->nullable();
                $table->decimal('vote_average', 10, 3)->nullable();
                $table->integer('vote_count')->nullable();
                //----------------------------------------------------------
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->timestamps();
            }
        );

        //-- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('url')) {
                    $table->string('url')->nullable();
                }
                if (! $this->hasColumn('path')) {
                    $table->string('path')->nullable();
                }
                if (! $this->hasColumn('guid')) {
                    $table->string('guid')->nullable();
                }
                if (! $this->hasColumn('status')) {
                    $table->string('status')->nullable();
                }
                if (! $this->hasColumn('info')) {
                    $table->json('info')->nullable();
                }
                if (! $this->hasColumn('video')) {
                    $table->boolean('video')->nullable();
                }
            }
        );
    }
}
