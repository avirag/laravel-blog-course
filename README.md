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
```