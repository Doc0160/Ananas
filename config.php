<?php

declare(strict_types = 1);

// BASE
define('BASEPATH', __DIR__);
define('BASEURI', "/ananas");
define('HOST', 'localhost');
define('ROOTURL', 'http://'.HOST.BASEURI);

// DATABASE
define("DATABASE_USERNAME", 'root');
define("DATABASE_PASSWORD", '');
define("DATABASE_HOST", 'localhost');
define("DATABASE_PORT", '3306');
define("DATABASE_DATABASE", 'ananas');

// DEFAUT USER
define("DEFAULT_USER_GROUP", 3);
define("DEFAULT_USER_AVATAR", "_peni.jpg");

// PERMISSION
$i = 0;
define("PERMISSION_READ_ACTIVITY", 2^$i++);
define("PERMISSION_MODIFY_ACTIVITY", 2^1);
define("PERMISSION_DELETE_ACTIVITY", 2^3);

define("PERMISSION_READ_PHOTO", 2^4);
define("PERMISSION_MODIFY_PHOTO", 2^5);
define("PERMISSION_DELETE_PHOTO", 2^6);

// DEFAULT PERMISSION
define("DEFAULT_PERMISSION_UNKNOWN", PERMISSION_READ_ACTIVITY|PERMISSION_READ_PHOTO);
