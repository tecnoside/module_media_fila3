<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---

use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateInvitationsTable.
 */
class CreateTemporaryUploadsTable extends XotBaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->id();
                $table->string('session_id');
                $table->timestamps();
            }
        );
        // -- UPDATE --
        //$this->tableUpdate(
            //function (Blueprint $table) {
                // if (! $this->hasColumn('channel_id')) {
                //    $table->integer('channel_id')->nullable();
                // }
            //}
        //);
    }
}