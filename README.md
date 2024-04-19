# Hyco Library

Hyco library

## Installation

Open terminal or command prompt and go to your laravel project

```
composer require akhmads/hyco:dev-main
```

Run the artisan command

```
php artisan hyco:install
```

Open `tailwind.config.js` add following code

```
export default {
    content: [
        ...
        // Hyco
        "./vendor/akhmads/hyco/src/View/Components/**/*.php",
        "./vendor/akhmads/hyco/src/resources/views/**/*.php",
    ],
    ...
}
```

Test the application

```
php artisan serve
```

Enter this address in the browser

```
http://127.0.0.1:8000/hyco/counter
```
