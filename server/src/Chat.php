<?php
namespace ChatApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat extends BasicChat {


    public function onMessage(ConnectionInterface $from, $msg)
    {

        //send the message to all the other clients except the one who sent.
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }

    }
}