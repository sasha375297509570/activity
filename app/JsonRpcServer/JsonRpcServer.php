<?php

namespace App\JsonRpcServer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Response\JsonRpcResponse;
use App\Exceptions\JsonRpcException;

class JsonRpcServer
{
    /**
     *
     * @param Request $request
     * @param Controller $controller    
     */
    public function handle(Request $request, Controller $controller)
    {        
        try {            
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                throw new JsonRpcException('Parse error', ErrorCode::PARSE_ERROR);
            }            
            $result = $controller->{$content['method']}($request);

            return JsonRpcResponse::success($result, $content['id']);
        } catch (\Exception $e) {
            return JsonRpcResponse::error($e->getMessage());
        }
    }
}
