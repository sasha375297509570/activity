<?php

namespace App\Http\Response;

use Illuminate\Pagination\LengthAwarePaginator;

class JsonRpcResponse
{
    public const JSON_RPC_VERSION = '2.0';

    /**
     *
     * @param LengthAwarePaginator|bool $result
     * @param string|null $id
     * @return array
     */
    public static function success(LengthAwarePaginator|bool $result, string $id = null): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'result'  => $result,
            'id'      => $id,
        ];
    }

    /**
     *     
     * @param string $error
     * @return array
     */
    public static function error(string $error): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'error'  => $error,
            'id'      => null,
        ];
    }
}
