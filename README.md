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
