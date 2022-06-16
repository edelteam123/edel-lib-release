<?php

namespace com\edel\Resources;

use JsonSerializable;

/**
 * ChartsIntradayResource
 */
class ChartsResponseFormatter implements JsonSerializable
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
            'nextTillDate' => $this->response['data']['plt_pnts']['ltt'][0],
            'data' => $this->generateOHLCChartData($this->response)
        ];
    }


    /**
     * generateOHLCChartData
     *
     * @param  mixed $response
     * @return array
     */
    private function generateOHLCChartData($response): array
    {
        if (isset($response['data'])) {
            $ltt = $response['data']['plt_pnts']['ltt'];
            $open = $response['data']['plt_pnts']['open'];
            $high = $response['data']['plt_pnts']['high'];
            $low = $response['data']['plt_pnts']['low'];
            $close = $response['data']['plt_pnts']['close'];
            $vol = $response['data']['plt_pnts']['vol'];
            return array_map(null, $ltt, $open, $high, $low, $close, $vol);
        }
        return [];
    }
}
