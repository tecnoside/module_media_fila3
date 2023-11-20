<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0d82eb1 (.)
declare(strict_types=1);

use App\Listeners\GenerateSitemap;
use TightenCo\Jigsaw\Jigsaw;

/* @var $container \Illuminate\Container\Container */
/* @var $events \TightenCo\Jigsaw\Events\EventBus */

/*
=======
<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 8cc6011 (Check & fix styling)
use App\Listeners\GenerateSitemap;
use TightenCo\Jigsaw\Jigsaw;

/* @var $container \Illuminate\Container\Container */
/* @var $events \TightenCo\Jigsaw\Events\EventBus */

<<<<<<< HEAD
/**
>>>>>>> 97919d9 (up)
=======
/*
>>>>>>> 8cc6011 (Check & fix styling)
=======
use App\Listeners\GenerateSitemap;
use TightenCo\Jigsaw\Jigsaw;

/** @var $container \Illuminate\Container\Container */
/** @var $events \TightenCo\Jigsaw\Events\EventBus */

/**
>>>>>>> d67aa59 (up)
>>>>>>> 0d82eb1 (.)
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

$events->afterBuild(GenerateSitemap::class);
