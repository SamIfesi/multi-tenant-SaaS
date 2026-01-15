<?php

require __DIR__ . '/../bootstrap/app.php';

use App\Http\Kernel;

$kernel = new Kernel();
$response = $kernel->handle($_SERVER, $_REQUEST);

$response->send();
