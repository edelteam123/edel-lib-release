<?php

namespace com\apiconnect\Resources;

use JsonSerializable;

/**
 * LiveNewsCategoriesResponseFormatter
 */
class LiveNewsCategoriesResponseFormatter implements JsonSerializable
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
            'data' => $this->generateNewsCategoriesData($this->response)
        ];
    }


    /**
     * generateNewsCategoriesData
     *
     * @param  mixed $response
     * @return array
     */
    private function generateNewsCategoriesData($response): array
    {
        $categoriesLst = [];
        $j = json_encode($response['data']);
        foreach (json_decode($j) as $val) {
            if (is_array($val)) {
                foreach ($val as $v) {
                    if (property_exists($v, 'dpNm')) {
                        array_push($categoriesLst, $v->dpNm);
                    }
                }
            }
        }
        return $categoriesLst;
    }
}
