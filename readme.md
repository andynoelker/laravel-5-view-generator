# Laravel 5 View Generator

This Laravel 5 package adds a Blade view generator to make your development process easier.

## Installation

### Step 1: Install Through Composer

```
composer require andynoelker/laravel-5-view-generator
```

### Step 2: Add the Service Provider

Because you only want to use this generator for development, you will want to add it to the provider located in `app/Providers/AppServiceProvider.php` instead of adding to the providers array inside `config/app.php`.

```
public function register()
{
    if ($this->app->environment() == 'local') {
        $this->app->register('Andynoelker\Laravel5ViewGenerator\ViewGeneratorServiceProvider');
    }
}

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

