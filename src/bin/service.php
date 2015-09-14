<?php

namespace Ratchet;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Service implements MessageComponentInterface{

    protected $clients;
    private $users;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->users = array();

    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        $request = json_decode($msg);

        if($request->type == "login"){

        }
        else if($request->type == "message"){
            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    // The sender is not the receiver, send to each client connected
                    $message = $request->message;
                    $client->send($message);
                }
            }
        }

    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages

        $this->logoutHandler($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        //echo "An error has occurred: {$e->getMessage()}\n";

        $this->logoutHandler($conn);
        $conn->close();
    }

    public function messageHandler(){

    }

    public function loginHandler(){

    }

    public function logoutHandler($conn){
        $this->clients->detach($conn);
    }

    public function getOnlineUser(){

    }

}