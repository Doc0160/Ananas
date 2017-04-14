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
define("PERMISSION_READ_ACTIVITY", 1 << $i++);
define("PERMISSION_CREATE_ACTIVITY", 1 << $i++);
define("PERMISSION_MODIFY_ACTIVITY", 1 << $i++);
define("PERMISSION_DELETE_ACTIVITY", 1 << $i++);
define("PERMISSION_PARTICIPATE_ACTIVITY", 1 << $i++);

define("PERMISSION_READ_PHOTO", 1 << $i++);
define("PERMISSION_CREATE_PHOTO", 1 << $i++);
define("PERMISSION_MODIFY_PHOTO", 1 << $i++);
define("PERMISSION_DELETE_PHOTO", 1 << $i++);
define("PERMISSION_LIKE_PHOTO", 1 << $i++);
define("PERMISSION_COMMENT_PHOTO", 1 << $i++);

define("PERMISSION_GROUPE_CREATE", 1 << $i++);
define("PERMISSION_GROUPE_MODIFY", 1 << $i++);
define("PERMISSION_GROUPE_DELETE", 1 << $i++);

define("PERMISSION_GOODIES_READ", 1 << $i++);
define("PERMISSION_GOODIES_CREATE", 1 << $i++);
define("PERMISSION_GOODIES_MODIFY", 1 << $i++);
define("PERMISSION_GOODIES_DELETE", 1 << $i++);
define("PERMISSION_GOODIES_BUY", 1 << $i++);

// DEFAULT PERMISSION
define("DEFAULT_PERMISSION_UNKNOWN",
       PERMISSION_READ_ACTIVITY|
       PERMISSION_READ_PHOTO);
