<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;

define('__ENV_DEV', 'dev');
define('__ENV_PRODUCTION', 'prod');

$__clientIp = getenv('REMOTE_ADDR');

/**
 * TRUE if this is a dev server environment
 */
define('__IS_DEV_SERVER', in_array($__clientIp, array('127.0.0.1', '192.168.1.158', '192.168.1.154', '192.168.1.155', '192.168.1.152', '10.42.0.11')));

if (__IS_DEV_SERVER) {
    error_reporting(E_ALL);
    umask(0000);
}

$symfony_config = __ENV_DEV;
$symfony_debug = true;

if (!__IS_DEV_SERVER) {
    $symfony_config = __ENV_PRODUCTION;
    $symfony_debug = false;
}

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';

// Use APC for autoloading to improve performance.
// Change 'sf2' to a unique prefix in order to prevent cache key conflicts
// with other applications also using APC.
/*
$loader = new ApcClassLoader('sf2', $loader);
$loader->register(true);
*/

require_once __DIR__.'/../app/AppKernel.php';
//require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel($symfony_config, $symfony_debug);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);
Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
