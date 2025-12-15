<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
echo "DB Config Default: " . config('database.default') . "\n";
echo "Env DB_CONNECTION: " . env('DB_CONNECTION') . "\n";
try {
    \DB::connection()->getPdo();
    echo "Connected Database Name: " . \DB::connection()->getDatabaseName() . "\n";
} catch (\Exception $e) {
    echo "Connection Error: " . $e->getMessage() . "\n";
}
