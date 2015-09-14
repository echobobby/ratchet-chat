<?php
/**
 * Created by PhpStorm.
 * User: Bob
 * Date: 9/14/15
 * Time: 3:10 PM
 */

namespace Ratchet;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\Service;

require dirname(__DIR__) . '../../vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Service()
        )
    ),
    8080
);

$server->run();