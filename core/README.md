# CORE

* Autoloader
```php
$autoloader = new Autoload();
spl_autoload_register([$autoloader, 'load']);
```

* Router
```php
$router = new Router('/');
$router->add('/', function() {
echo 'hello';
});
$router->dispatch();
```

* View
```php
$view = new View('./views/');
$view->display('hello.php');
```

* Controller
```php
$controller = new Controller('./controllers/');
$controller->execute('hello.php');
```
