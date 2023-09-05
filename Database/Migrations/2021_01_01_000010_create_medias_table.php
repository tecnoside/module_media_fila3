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
class CreateMediasTable extends XotBaseMigration
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
                $blueprint->uuid('uuid')->nullable()->unique();
                $blueprint->string('collection_name');
                $blueprint->string('name');
                $blueprint->string('file_name');
                $blueprint->string('mime_type')->nullable();
                $blueprint->string('disk');
                $blueprint->string('conversions_disk')->nullable();
                $blueprint->unsignedBigInteger('size');
                $blueprint->json('manipulations');
                $blueprint->json('custom_properties');
                $blueprint->json('generated_conversions');
                $blueprint->json('responsive_images');
                $blueprint->unsignedInteger('order_column')->nullable()->index();

                $blueprint->nullableTimestamps();
                // ----------------------------------------------------------
                $blueprint->string('created_by')->nullable();
                $blueprint->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $blueprint): void {
                if (! $this->hasColumn('user_id')) {
                    $blueprint->integer('user_id');
                }
                if (! $this->hasColumn('order_column')) {
                    $blueprint->unsignedInteger('order_column')->nullable()->index();
                }

                if (! $this->hasColumn('disk')) {
                    $blueprint->string('disk')->default('public');
                }
                if (! $this->hasColumn('directory')) {
                    $blueprint->string('directory')->default('media');
                }
                if (! $this->hasColumn('name')) {
                    $blueprint->string('name')->nullable();
                }
                if (! $this->hasColumn('path')) {
                    $blueprint->string('path')->nullable();
                }
                if (! $this->hasColumn('width')) {
                    $blueprint->unsignedInteger('width')->nullable();
                }
                if (! $this->hasColumn('height')) {
                    $blueprint->unsignedInteger('height')->nullable();
                }
                if (! $this->hasColumn('size')) {
                    $blueprint->unsignedInteger('size')->nullable();
                }
                if (! $this->hasColumn('type')) {
                    $blueprint->string('type')->default('image')->nullable();
                }
                if (! $this->hasColumn('ext')) {
                    $blueprint->string('ext')->nullable();
                }
                if (! $this->hasColumn('alt')) {
                    $blueprint->string('alt')->nullable();
                }
                if (! $this->hasColumn('title')) {
                    $blueprint->string('title')->nullable();
                }
                if (! $this->hasColumn('description')) {
                    $blueprint->text('description')->nullable();
                }
                if (! $this->hasColumn('caption')) {
                    $blueprint->text('caption')->nullable();
                }
                if (! $this->hasColumn('exif')) {
                    $blueprint->text('exif')->nullable();
                }
                if (! $this->hasColumn('curations')) {
                    $blueprint->longText('curations')->nullable();
                }
            }
        );
    }
}
