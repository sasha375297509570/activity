<?php

namespace App\JsonRpcServer;

final class ErrorCode
{

    const PARSE_ERROR = -11200;
    const INVALID_REQUEST = -11300;
    const METHOD_NOT_FOUND = -11400;
    const INVALID_PARAMS = -11500;
    const INTERNAL_ERROR = -11600;

    private function __construct()
    {
        // pass
    }

}