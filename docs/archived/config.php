<?php

declare(strict_types=1);

use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Modulo Media',
    'siteDescription' => 'Modulo Media',
    'lang' => 'it',

    'collections' => [
        'posts' => [
            'path' => function ($page) {
                return $page->lang.'/posts/'.Str::slug($page->getFilename());
            },
        ],
        'docs' => [
            'path' => function ($page) {
                return $page->lang.'/docs/'.Str::slug($page->getFilename());
            },
        ],
    ],

    // Algolia DocSearch credentials
    'docsearchApiKey' => env('DOCSEARCH_KEY'),
    'docsearchIndexName' => env('DOCSEARCH_INDEX'),

    // navigation menu
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'navigation' => require_once ('navigation.php'),
=======
    'navigation' => require_once('navigation.php'),
>>>>>>> 24067278 (.)
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> cf29173e (Check & fix styling)
=======
    'navigation' => require_once('navigation.php'),
>>>>>>> 2e8c8bb7 (Dusting)
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> 78f714e6 (Check & fix styling)
=======
    'navigation' => require_once('navigation.php'),
>>>>>>> 77145936 (Dusting)
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> d50e2cc7 (Check & fix styling)
=======
    'navigation' => require_once('navigation.php'),
>>>>>>> 2228985c (Dusting)
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> c471a8c8 (Check & fix styling)

    // helpers
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isItemActive' => function ($page, $item) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($item->getPath()));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        if (Str::startsWith($path, 'http')) {
            return $path;
        }

        // return Str::startsWith($path, 'http') ? $path : '/' . trimPath($path);
        return url('/'.$page->lang.'/'.trimPath($path));
    },

    'children' => function ($page, $docs) {
        // return $docs->where('parent_id', $page->id);
        return [];
    },
];
