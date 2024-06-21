<?php

use Doctum\Doctum;

return new Doctum\Doctum('laravel-11/app', [
    'title' => 'Laravel 11 Curso Documentação API',
    'build_dir' => __DIR__ . '/public/docs',
]);