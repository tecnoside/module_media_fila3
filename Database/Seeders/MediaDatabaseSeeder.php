<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Media\database\seeders;

namespace Modules\Media\Database\Seeders;

=======
namespace Modules\Media\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
>>>>>>> 771f698d (first)
=======
namespace Modules\Media\database\seeders;

namespace Modules\Media\Database\Seeders;

>>>>>>> 7cc85766 (rebase 1)
use Illuminate\Database\Seeder;

class MediaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        // $this->call([]);
=======
        Model::unguard();

        // $this->call("OthersTableSeeder");
>>>>>>> 771f698d (first)
=======
        // $this->call([]);
>>>>>>> 7cc85766 (rebase 1)
    }
}
