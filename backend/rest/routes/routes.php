<?php
// routes/movies.php

Flight::route('GET /movies', function() {
    $dao = new MovieDAO(Flight::db());
    Flight::json($dao->getAll());
});

Flight::route('GET /movies/@id', function($id) {
    $dao = new MovieDAO(Flight::db());
    Flight::json($dao->get($id));
});

Flight::route('POST /movies', function() {
    $dao = new MovieDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json(["id" => $dao->create($data)]);
});

Flight::route('PUT /movies/@id', function($id) {
    $dao = new MovieDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json($dao->update($id, $data));
});

Flight::route('DELETE /movies/@id', function($id) {
    $dao = new MovieDAO(Flight::db());
    Flight::json($dao->delete($id));
});


// routes/customers.php

Flight::route('GET /customers', function() {
    $dao = new CustomerDAO(Flight::db());
    Flight::json($dao->getAll());
});

Flight::route('GET /customers/@id', function($id) {
    $dao = new CustomerDAO(Flight::db());
    Flight::json($dao->get($id));
});

Flight::route('POST /customers', function() {
    $dao = new CustomerDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json(["id" => $dao->create($data)]);
});

Flight::route('PUT /customers/@id', function($id) {
    $dao = new CustomerDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json($dao->update($id, $data));
});

Flight::route('DELETE /customers/@id', function($id) {
    $dao = new CustomerDAO(Flight::db());
    Flight::json($dao->delete($id));
});


// routes/tickets.php

Flight::route('GET /tickets', function() {
    $dao = new TicketDAO(Flight::db());
    Flight::json($dao->getAll());
});

Flight::route('GET /tickets/@id', function($id) {
    $dao = new TicketDAO(Flight::db());
    Flight::json($dao->get($id));
});

Flight::route('POST /tickets', function() {
    $dao = new TicketDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json(["id" => $dao->create($data)]);
});

Flight::route('PUT /tickets/@id', function($id) {
    $dao = new TicketDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json($dao->update($id, $data));
});

Flight::route('DELETE /tickets/@id', function($id) {
    $dao = new TicketDAO(Flight::db());
    Flight::json($dao->delete($id));
});


// routes/payments.php

Flight::route('GET /payments', function() {
    $dao = new PaymentDAO(Flight::db());
    Flight::json($dao->getAll());
});

Flight::route('GET /payments/@id', function($id) {
    $dao = new PaymentDAO(Flight::db());
    Flight::json($dao->get($id));
});

Flight::route('POST /payments', function() {
    $dao = new PaymentDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json(["id" => $dao->create($data)]);
});

Flight::route('PUT /payments/@id', function($id) {
    $dao = new PaymentDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json($dao->update($id, $data));
});

Flight::route('DELETE /payments/@id', function($id) {
    $dao = new PaymentDAO(Flight::db());
    Flight::json($dao->delete($id));
});


// routes/showtimes.php

Flight::route('GET /showtimes', function() {
    $dao = new ShowtimeDAO(Flight::db());
    Flight::json($dao->getAll());
});

Flight::route('GET /showtimes/@id', function($id) {
    $dao = new ShowtimeDAO(Flight::db());
    Flight::json($dao->get($id));
});

Flight::route('POST /showtimes', function() {
    $dao = new ShowtimeDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json(["id" => $dao->create($data)]);
});

Flight::route('PUT /showtimes/@id', function($id) {
    $dao = new ShowtimeDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json($dao->update($id, $data));
});

Flight::route('DELETE /showtimes/@id', function($id) {
    $dao = new ShowtimeDAO(Flight::db());
    Flight::json($dao->delete($id));
});


// routes/theaters.php

Flight::route('GET /theaters', function() {
    $dao = new TheaterDAO(Flight::db());
    Flight::json($dao->getAll());
});

Flight::route('GET /theaters/@id', function($id) {
    $dao = new TheaterDAO(Flight::db());
    Flight::json($dao->get($id));
});

Flight::route('POST /theaters', function() {
    $dao = new TheaterDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json(["id" => $dao->create($data)]);
});

Flight::route('PUT /theaters/@id', function($id) {
    $dao = new TheaterDAO(Flight::db());
    $data = Flight::request()->data->getData();
    Flight::json($dao->update($id, $data));
});

Flight::route('DELETE /theaters/@id', function($id) {
    $dao = new TheaterDAO(Flight::db());
    Flight::json($dao->delete($id));
});
