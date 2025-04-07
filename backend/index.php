<?php
require 'vendor/autoload.php';
require 'config/config.php';

Flight::route('GET /api/ping', function() {
    echo json_encode(['pong' => true]);
});

require 'routes/movies.php';

Flight::start();
