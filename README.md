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

php artisan db:seed
php artisan make:controller BlogController

php artisan make:migration alter_posts_add_published_at_column --table=posts
php artisan migrate

php artisan tinker
>>> $date = Carbon\Carbon::now()
>>> $date = Carbon\Carbon::create(2015, 5, 16)
>>> $date->addDay()
>>> $date->addDays(6)
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
```$xslt
Local Scopes
Accessors
```

