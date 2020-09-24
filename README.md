## Simple Laravel Viewable

This package adds views to your eloquent model. It keeps a record of user visits.

##
#### Requirements:

This package requires Laravel version >= 6.0 and php version >=7.2. There are 
no dependencies for this package other than Laravel components. This may
change in the future. 

| Version      | Laravel Version |
| ----------- | ----------- |
| ^1.0      | ^6.0       |

##
#### Installation:
Use composer to download the package
```
composer require mohamedshuaau/simple-viewable
```

Laravel's auto discovery should register the package service provider.

After the installation, you can publish the package content with:
```
php artisan vendor:publish
```

After publishing, you can migrate the table:
```
php artisan migrate
```

In order for your models to be 'viewable', use the trait, `ViewableModel` in your model:
```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Shuaau\SimpleViewable\Traits\ViewableModel;

class Post extends Model
{
    use ViewableModel;

    //...
}

```
##
#### Basic Usage:

For a more elaborated explanation of the functions, [Read this](./ELABORATED.md).

```php
//Your post
$post = Post::find(1);

//dates
$fiveMinutes = Carbon::now()->addMinutes(5);
$from = Carbon::yesterday();
$to = Carbon::now();

//non-unique view
SimpleViewable::view($post);

//unique view
SimpleViewable::unique($post);

//expireable view
SimpleViewable::expires($post, $fiveMinutes);

//count views
SimpleViewable::count($post);

//count unique views
SimpleViewable::countUnique($post);

//count views from
SimpleViewable::countFrom($post, $from);

//count views in between dates
SimpleViewable::countBetween($post, $from, $to);

//count unique views from
SimpleViewable::countUniqueFrom($post, $from);

//count unique views in between dates
SimpleViewable::countUniqueBetween($post, $from, $to);
```

More features are to come in the future. This package is open for suggestions
and improvements.
<br>
You are free to use this package and modify it to your needs.
