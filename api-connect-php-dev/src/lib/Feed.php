<?php

namespace com\apiconnect;

use Logger;
use com\apiconnect\LogConfig;
use GuzzleHttp\Client;
use com\apiconnect\ApiException;
use com\apiconnect\Configuration;
use com\apiconnect\HeaderSelector;
use com\apiconnect\ObjectSerializer;
use Exception;
use stdClass;

class Feed
{
    protected $log;
    protected $iniFilePath;
    protected $accId;
    protected $userId;
    protected $appId;
    protected $formFactor;
    protected $server;
    protected $port;
    protected $filename;
    protected $symbols = [];
    protected $sock;
    protected $callBack;

    protected $apiKey;

    public function __construct(String $accId, String $userId, String $iniFilePath)
    {
        $this->iniConfig = parse_ini_file($iniFilePath);
        $this->accId = $accId;
        $this->userId = $userId;
        $this->appId = $this->iniConfig['AppIdKey'];
        $this->formFactor = $this->iniConfig['FormFactor'];
        $this->server = $this->iniConfig['Server'];
        $this->port = $this->iniConfig['Port'];
        $logConfig = new LogConfig;
        Logger::configure($logConfig->getLogConfig($this->iniConfig['LogLevel'], $this->iniConfig['LogFilePath']));
        $this->log = Logger::getRootLogger();
        $this->sock = $this->nonblockSocketConnect();
    }

    public function subscribe($sysmbls, $callBack, $subscribeOrder = True, $subscribeQuote = True)
    {
        $this->symbols = $sysmbls;
        if ($subscribeOrder) {
            $quote = $this->CreateMessageQuote($sysmbls);
            $this->log->debug("subscribeOrder:" . $quote);
            socket_write($this->sock, $quote, strlen($quote));
        }
        if ($subscribeQuote) {
            $OrderFiler = $this->CreateMessageOrderFiler($sysmbls);
            $this->log->debug("subscribeOrder:" . $OrderFiler);
            socket_write($this->sock, $OrderFiler, strlen($OrderFiler));
        }

        do {
            $result = socket_read($this->sock, 2048);
            if ($result === FALSE || strcmp($result, '') == 0) {
                // cleared the error, or it will not change on next read
                $error = socket_last_error($this->sock);
                socket_clear_error($this->sock);
                if ($error != 11 && $error != 115 && $error != 10035) {
                    $this->socket_error($this->sock);
                    break;
                }
            } else {
                $this->log->debug("Subscribe:" . $result);
                call_user_func($callBack, $result);
            }
        } while (true);
        socket_close($this->sock);
    }
    private function CreateMessageQuote($symbols)
    {
        $symset = [];
        foreach ($symbols as $syms) {
            array_push($symset, array("symbol" => $syms));
        }

        $req['request'] =
            array(
                'streaming_type' => "quote3",
                "data" => array("accType" => "EQ", "symbols" => $symset),
                "formFactor" => "M",
                "appID" => $this->appId,
                "response_format" => "json",
                "request_type" => "subscribe"
            );
        $req['echo'] = new stdClass;
        return json_encode($req) . "\n";
    }
    private function CreateMessageOrderFiler()
    {
        $req['request'] =
            array(
                'streaming_type' => "orderFiler",
                "data" => array(
                    "accType" => "EQ",
                    "userID" => $this->userId,
                    "accID" => $this->accId,
                    "responseType" => ["ORDER_UPDATE", "TRADE_UPDATE"]
                ),
                "formFactor" => "M",
                "appID" => $this->appId,
                "response_format" => "json",
                "request_type" => "subscribe"
            );
        $req['echo'] = new stdClass;
        return json_encode($req) . "\n";
    }
    public function unsubscribe($symbols, $callBack = NULL)
    {

        if ($symbols) {
            $symset = [];
            foreach ($symbols as $syms) {
                array_push($symset, array("symbol" => $syms));
            }
        }
        $req['request'] =
            array(
                'streaming_type' => "quote3", "data" => array("symbols" => $symset),
                "formFactor" => $this->formFactor,
                "appID" => $this->appId,
                "response_format" => "json",
                "request_type" => "unsubscribe"
            );
        $req['echo'] = new stdClass;
        $this->log->debug("UnSubscribe Request:" . json_encode($req));
        isset($callBack) ? call_user_func($callBack, json_encode($req)) : null;

        $data = json_encode($req) . "\n";
        if (!socket_send($this->sock, $data, strlen($data), 0)) {
            $errorcode = socket_last_error();
            $errormsg = socket_strerror($errorcode);
            $this->log->debug("Could not send data: [$errorcode] $errormsg \n");
            die("Could not send data: [$errorcode] $errormsg \n");
        }
        $this->log->debug("Message send successfully \n");
        socket_close($this->sock);
    }

    private function nonblockSocketConnect()
    {
        $socket = socket_create(AF_INET, SOCK_STREAM, 0);

        if (!socket_set_nonblock($socket)) {
            $this->socket_error($socket);
        }
        socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 0, 'usec' => 0)); // set timeout to something fast, 0 second.

        $connected = @socket_connect($socket, $this->server, $this->port);
        if (!$connected) {
            $error = socket_last_error();
            if ($error != 10035 && $error != SOCKET_EINPROGRESS && $error != SOCKET_EALREADY) {
                echo "Error Connecting Socket: " . socket_strerror($error) . "\n";
                socket_close($socket);
                /* Todo : try to reconnect with socket if connection drops */
                exit();
            }
        }
        return $socket;
    }

    private function socket_error($socket)
    {
        $errno = socket_last_error($socket);
        $errstr = socket_strerror($errno);

        throw new Exception($errstr, $errno);
    }
}
