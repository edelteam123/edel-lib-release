<?php

namespace com\edel;

class EdelweissApiUtil
{
    private $container = [];

    public function init($data)
    {
        $this->container['vendorSession'] = $data['vt'] ?? null;
        $this->container['apiKey'] = $data['apiKey'] ?? null;
        $this->container['eqAccId'] = $data['eqAccId'] ?? null;
        $this->container['coAccId'] = $data['coAccId'] ?? null;
        $this->container['jSessionId'] = $data['auth'] ?? null;
        $this->container['appIdKey'] = $data['appIdKey'] ?? null;
        $this->container['data'] = $data['data'] ?? null;
        $this->container['filename'] = $data['filename'] ?? null;
        $this->container['acctyp'] = $data['acctyp'] ?? null;
    }

    public function getVendorSession()
    {
        return $this->container['vendorSession'];
    }

    public function getApiKey()
    {
        return $this->container['apiKey'];
    }

    public function getEqAccId()
    {
        return $this->container['eqAccId'];
    }

    public function getCoAccId()
    {
        return $this->container['coAccId'];
    }

    public function getJSessionId()
    {
        return $this->container['jSessionId'];
    }

    public function getAppIdKey()
    {
        return $this->container['appIdKey'];
    }

    public function getData()
    {
        return $this->container['data'];
    }

    public function getFilename()
    {
        return $this->container['filename'];
    }

    public function getAccTyp()
    {
        return $this->container['acctyp'];
    }
}
