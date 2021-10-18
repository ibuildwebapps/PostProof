<?php

namespace App\Http\Controllers;

use App\Models\Hit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class APIListenerController extends Controller
{
    //This is a catch-all for /listener endpoint
    public function index(Request $request)
    {
        $method = $request->method() ;
        $expectedContentTypes = $request->getAcceptableContentTypes() ;
        $clientIPs = $request->getClientIps() ;
        $defaultLocale = $request->getDefaultLocale() ;
        $scheme = $request->getScheme() ;
        $postData = $request->post() ;
        $getData = $request->query() ;
        $requestHeaders = $request->header() ;

        Log::info('Scheme: ' . $scheme) ;
        Log::info('Method: ' . $method) ;
        Log::info('Expected Content Types: ' . json_encode($expectedContentTypes)) ;
        Log::info('Client IPs: ' . json_encode($clientIPs)) ;
        Log::info('Default Locale: ' . $defaultLocale) ;
        Log::info('POST Data: ' . json_encode($postData)) ;
        Log::info('GET Data: ' . json_encode($getData)) ;
        Log::info('Headers: ') ;
        foreach($requestHeaders AS $k => $v)
            if(count($v) > 1)
                Log::info($k . ' = ' . json_encode($v)) ;
            else
                Log::info($k . ' = ' . $v[0]) ;

        $hit = Hit::create(['scheme' => $scheme,
                                        'method' => $method,
                                        'expected_content_types' => json_encode($expectedContentTypes),
                                        'client_ips' => json_encode($clientIPs),
                                        'default_locale' => $defaultLocale,
                                        'post_data' => json_encode($postData),
                                        'get_data' => json_encode($getData),
                                        'headers' => json_encode($requestHeaders)]) ;
    }
}
