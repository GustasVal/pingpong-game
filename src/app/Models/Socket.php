<?php


namespace App\Models;


use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use SplObjectStorage;

class Socket implements MessageComponentInterface
{
    /**
     * @var SplObjectStorage
     */
    private $clients;

    public function __construct()
    {
        $this->clients = new SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        echo "Place: {$msg}";
        foreach ($this->clients as $client) {
            if ($from->resourceId == $client->resourceId) {
                continue;
            }

            $client->send($msg);
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
    }
}
