---
title: Try Video Editor Sub
description: Try Video Editor Sub Action
extends: _layouts.documentation
section: content
---

# Try Video Editor Sub Action {#try-video-editor-sub-action}


Action Path:

```php
/Modules/Media/Models/Panels/Actions/TryVideoEditorSubAction.php
```

Panel Path:

```php
/Modules/Media/Models/Panels/_ModulePanel.php
```

Policy Path:

```php
/Modules/Media/Models/Panels/Policies/_ModulePanelPolicy.php
```

Action Type:

```php
On Item
```

Handler functionality:

1. It connects to TMDB driver.

The TMDB driver in Laravel is an add-on component for the Laravel web framework that provides functionality for using the The Movie Database (TMDB) API within a Laravel project.

2. Gets the popular movies from TMDB
3. For each movie, gets the detailed informations, its poster, etc..
4. If it's a youtube video, it creates the model with its url in /Modules/Media/Models/Video.php