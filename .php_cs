<?php

require_once realpath(__DIR__ . '/vendor/autoload.php');

use PhpCsFixer\Finder;
use Jedkirby\PhpCs\Config;

$finder = Finder::create();
$finder->in([
    __DIR__ . '/src',
    __DIR__ . '/tests',
]);

$config = new Config('hive-php-api');
$config->setFinder($finder);

return $config;
