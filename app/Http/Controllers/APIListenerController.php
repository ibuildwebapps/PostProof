<?php

namespace App\Http\Controllers;

use App\Models\Hit;
use App\Models\Metadata;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class APIListenerController extends Controller
{
    //This is a catch-all for /listener endpoint
    public function index(Request $request, $tag = null)
    {
        $method = $request->method();
        $expectedContentTypes = $request->getAcceptableContentTypes();
        $clientIPs = $request->getClientIps();
        $defaultLocale = $request->getDefaultLocale();
        $scheme = $request->getScheme();
        $postData = $request->post();
        $getData = $request->query();
        $requestHeaders = $request->header();

//        Log::info('Tag: ' . $tag);
//        Log::info('Scheme: ' . $scheme);
//        Log::info('Method: ' . $method);
//        Log::info('User Agent: ' . $request->userAgent());
//        Log::info('Expected Content Types: ' . json_encode($expectedContentTypes));
//        Log::info('Client IPs: ' . json_encode($clientIPs));
//        Log::info('Default Locale: ' . $defaultLocale);
//        Log::info('POST Data: ' . json_encode($postData));
//        Log::info('GET Data: ' . json_encode($getData));
//        Log::info('Headers: ');
//        foreach ($requestHeaders as $k => $v)
//            if (count($v) > 1)
//                Log::info($k . ' = ' . json_encode($v));
//            else
//                Log::info($k . ' = ' . $v[0]);
//
//        Log::info('creating hit');

        $hit = Hit::create(['tag'                    => $tag ?? null,
                            'scheme'                 => $scheme,
                            'method'                 => $method,
                            'expected_content_types' => json_encode($expectedContentTypes),
                            'client_ips'             => json_encode($clientIPs),
                            'default_locale'         => $defaultLocale,
                            'user_agent'             => $request->userAgent(),
                            'post_data'              => json_encode($postData),
                            'get_data'               => json_encode($getData),
                            'headers'                => json_encode($requestHeaders)]);
        //Log::info('hit created');

        if ($hit)
        {
            //Write POST
            foreach ($postData as $k => $v)
            {
                Metadata::create(['fk_hit_id'      => $hit->id,
                                  'metadata_key'   => $k,
                                  'metadata_value' => $v,
                                  'metadata_type'  => 'POST']);
            }
            //Write GET
            foreach ($getData as $k => $v)
            {
                Metadata::create(['fk_hit_id'      => $hit->id,
                                  'metadata_key'   => $k,
                                  'metadata_value' => $v,
                                  'metadata_type'  => 'GET']);
            }
            //Write Headers
            foreach ($requestHeaders as $k => $v)
            {
                if (is_array($v))
                {
                    foreach ($v as $v1)
                    {
                        Metadata::create(['fk_hit_id'      => $hit->id,
                                          'metadata_key'   => $k,
                                          'metadata_value' => $v1,
                                          'metadata_type'  => 'HEADER']);
                    }
                }
                else
                {
                    Metadata::create(['fk_hit_id'      => $hit->id,
                                      'metadata_key'   => $k,
                                      'metadata_value' => $v,
                                      'metadata_type'  => 'HEADER']);
                }
            }

            //If we are doing a passthrough, make the request here (refactor to helper function)
            return Response::HTTP_OK;
        }

        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
