<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api=app('Dingo\Api\Routing\Router');
$api->version('v1',function($api){
$api->get('version',function(){
    $sms = app('easysms');
    try {
        $sms->send(15899595363, [
            'content'  => '【Lbbs社区】您的验证码是1234。如非本人操作，请忽略本短信',
        ]);
} catch (\GuzzleHttp\Exception\ClientException $exception) {
        $response = $exception->getResponse();
        $result = json_decode($response->getBody()->getContents(), true);
        dd($result);
    }
});
});
$api->version('v2',function($api){
    $api->get('version',function(){
        return response('thi is version v2');
    });
});