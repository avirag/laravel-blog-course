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

$ php artisan make:request PostRequest

$ php artisan tinker
>>> Config::get('cms.image.directory');
>>> config('cms.image.directory');

$ php artisan make:migration add_soft_deletion_to_posts_table --table=posts

$ php artisan make:controller Backend/CategoriesController --resource

$ php artisan make:request CategoryStoreRequest
$ php artisan make:request CategoryUpdateRequest

$ php artisan make:request CategoryDestroyRequest

$ php artisan laratrust:migration
$ php artisan migrate
$ php artisan make:model Role
$ php artisan make:model Permission
$ php artisan make:seeder RolesTableSeeder
$ php artisan make:seeder PermissionsTableSeeder
$ php artisan make:middleware CheckPermissionsMiddleware

$ php artisan make:model Tag -m
$ php artisan make:seeder TagsTableSeeder
$ php artisan db:seed --class TagsTableSeeder
$php artisan tinker
>>> $post = App\Post::first()
>>> $php = App\Tag::where('slug', 'php')->first();
>>> $post->tags()->attach($php);
>>> $post->fresh()->tags

$ php artisan make:model Comment -m
$ php artisan make:seeder CommentsTableSeeder
$ php artisan make:controller CommentsController
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
### Html shortcut
```
.box>(.box-header.with-border>h3.box-title)+.box-body
```
