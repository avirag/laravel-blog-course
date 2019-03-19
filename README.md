### Data
```
$ php artisan make:model Post -m
$ php artisan migrate
$ php artisan make:seed PostsTableSeeder
$ php artisan make:seed UsersTableSeeder

$ php artisan tinker
>>> $faker = Faker\Factory::create();
>>> $faker->word
>>> $faker->sentence
>>> $faker->sentences
>>> $faker->sentences(6)
>>> q

$ php artisan db:seed
$ php artisan make:controller BlogController

$ php artisan make:migration alter_posts_add_published_at_column --table=posts
$ php artisan migrate

$ php artisan tinker
>>> $date = Carbon\Carbon::now()
>>> $date = Carbon\Carbon::create(2015, 5, 16)
>>> $date->addDay()
>>> $date->addDays(6)

$ php artisan make:migration create_categories_table --create=categories
$ php artisan make:migration alter_posts_add_category_id_column --table=posts
$ php artisan migrate
$ php artisan migrate:refresh
$ php artisan make:seeder CategoriesTableSeeder
$ php artisan make:model Category

$ php artisan make:provider ComposerServiceProvider

$ php artisan make:migration alter_users_add_slug_column --table=users
$ php artisan migrate

$ php artisan make:migration alter_users_add_bio_column --table=users
$ php artisan migrate

$ php artisan make:migration alter_posts_add_view_count_column --table=posts
$ php artisan migrate

$ php artisan make:auth

$ php artisan route:list

$ php artisan make:controller Backend/BackendController
$ php artisan make:controller Backend/BlogController --resource
```
### Debug
```
DB::enableQueryLog();
dd(DB::getQueryLog());
```
### Grouping
```
orderBy('created_at', 'desc')
latest()
```
### Date
```
date('Y-m-d H:i:s', strtotime("2019-03-01 08:00:00 + {$i} days"));
protected $dates = ['published_at'];

```
### Eloquent
```
Local Scopes
Accessors
```
### Slug

```
RouteServiceProvider with route binding
getRouteKeyName() in Model
```
### Compose of layout sidebar
```
create new service provider, and add to app/Providers
edit app/config/app.php

```

