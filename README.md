## About LaraCrud10

A simple Laravel10 CRUD app with CRUD unit test.

## How to run locally:

- Download dependencies:
```
npm install
```

```
composer install
```
- Setup your DB ex. laracrud
- Publish schema to DB:
```
php artisan migrate
```

- Serve by running:
```
valet park
```

- Compile assets:
```
npm run dev
```

- Visit http://laracrud.test/

## How to run test:

- Publish schema to DB:
```
php artisan migrate --database=sqlite
```
- Run test:
```
php artisan test
```