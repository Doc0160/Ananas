# CORE

* Autoloader
```php
$autoloader = new Autoload();
spl_autoload_register([$autoloader, 'load']);
```

* Router

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
