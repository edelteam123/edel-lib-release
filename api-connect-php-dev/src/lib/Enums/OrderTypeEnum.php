<?php

namespace com\apiconnect\Enums;

/**
 * OrderType
 */
class OrderTypeEnum extends BaseEnum
{
    const LIMIT = "LIMIT";
    const STOP_MARKET = "STOP_MARKET";
    const STOP_LIMIT = "STOP_LIMIT";
    const MARKET = "MARKET";
}
