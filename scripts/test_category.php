<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

App\Models\Category::create([
    'name' => 'Laravel',
    'slug' => 'laravel',
]);

echo "OK\n";

