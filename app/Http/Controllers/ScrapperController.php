<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJarInterface;

class ScrapperController extends Controller
{
    public function start(){
//        $jar = new \GuzzleHttp\Cookie\CookieJar();

//set header information including cookies, referer, etc.
//        $client = new Client([
//                'cookies' => true,
//                'headers' => [
//                    'Host'=> 'fpt-api.XXXXX.com',
//                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0',
//                    'Accept'=> '*/*',
//                    'Accept-Language'=> 'en-US,en;q=0.5',
//                    'Accept-Encoding'=> 'gzip, deflate, br',
//                    'Referer'=> 'https://tools.XXXXX.com/',
//                    'Cookie'=> '__cfduid=XXXXXX; optimizelyEndUserId=oeu1498769689109r0.32368438346411443; optimizelySegments=%7XX; _vis_opt_test_cookie=1; _vwo_uuid=AF15229BDFDAB8BA12asdasB9561E984147AE; _vis_opt_exp_163_combi=2; optimizelyPendingLogEvents=%5B%22n%3Dhttps%253asdasdA%252F%252Ftools.XXXXX.com%252F%26u%3Doeu1498769689109r0.32368438346411443%26wxhr%3Dtrue%26time%3D1asd501859409.619%26asd345435f%3D8430845asd915%26g%3D%22%5D',
//                    'Connection'=> 'keep-alive'
//                ]
//            ]
//        );
//
//        $response = $client->get('https://www.eghtesadonline.com/');
//        $body = (string) $response->getBody()->getContents();
//
//        $dom = new \DOMDocument();
//        libxml_use_internal_errors(true);
//        $dom->loadHTML($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

//        return $dom;
    }
}
