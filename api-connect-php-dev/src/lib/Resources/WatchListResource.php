<?php

namespace com\apiconnect\Resources;

use JsonSerializable;

/**
 * WatchListResource
 */
class WatchListResource implements JsonSerializable
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return [
            'msgID' => $this->response['msgID'],
            'srvTm' => $this->response['srvTm'],
            'data' => $this->response['data']
        ];
    }
}
