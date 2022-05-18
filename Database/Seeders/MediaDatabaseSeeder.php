<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class MediaDatabaseSeeder extends Seeder {
=======
namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MediaDatabaseSeeder extends Seeder
{
>>>>>>> c8055c5 (first commit)
    /**
     * Run the database seeds.
     *
     * @return void
     */
<<<<<<< HEAD
    public function run() {
=======
    public function run()
    {
>>>>>>> c8055c5 (first commit)
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
