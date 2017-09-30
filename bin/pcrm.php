<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2017-09-29 11:13
 */

use York8\Composer\Repo\Application;

define('ROOT', dirname(__DIR__));
define('VENDOR', ROOT . DIRECTORY_SEPARATOR . 'vendor');

require VENDOR . '/autoload.php';

$app = new Application();
$app->runWithTry($argv);