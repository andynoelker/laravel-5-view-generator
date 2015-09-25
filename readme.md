# Detailed readme coming soon

This Laravel 5 package adds a view generator to make your development process easier.

## Usage

```
php artisan make:view myView
```

This will generate a blank `myView.blade.php` file in the views directory.

### Parent Option

You can optionally specify a parent view that your new view will extend.

```
php artisan make:view myView --parent="parentView"
```

This will generate a view file that opens with:

```
@extends('parentView')
```

