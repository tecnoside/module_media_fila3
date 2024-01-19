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
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 12737bcc (rebase 7)
=======
>>>>>>> 78a1e944 (rebase 7)
    'navigation' => require_once ('navigation.php'),
=======

    'navigation' => require_once('navigation.php'),
>>>>>>> 771f698d (first)
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> 7cc85766 (rebase 1)
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> 76f3bf5f (first)
=======
    'navigation' => require_once ('navigation.php'),
>>>>>>> b9ba8917 (.)

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
