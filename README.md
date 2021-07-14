### Creating laravel project:
```
composer create-project laravel/laravel laravel-restful-api
cd laravel-restful-api
php artisan serve
```


### Setting up the Application:

#### Creating: Migration, Factory, Seeder
```
php artisan make:model Petition -mfs
```

If we need to create all the artefacts
```
php artisan make:model Petition --all
``` 

#### Creating: Controller and Resources
```
php artisan make:controller PetitionController --api --model=Petition
php artisan make:resource PetitionResource
php artisan make:resource PetitionCollection
```

####Dependencies:
```
composer require doctrine/dbal
```

#### New migrations:
```
php artisan make:migration change_category_type --table=petitions
php artisan make:migration change_category_type_in_petitions
```
(PS: in_petitions means --table=petitions)


#### Run and Rollback migrations:
```
php artisan migrate
php artisan migrate:rollback --step=1
```

#### Seed database with test data:
```
php artisan db:seed
php artisan db:seed --class=PetitionSeeder
```


### Laravel 8.x Documentation:
[https://laravel.com/docs/8.x](https://laravel.com/docs/8.x)

