<?php

class Curl {
    /**
     * run get requset 
     *
     * @param  $url
     * @param  $request_header
     * @param  $retry
     * @param  $sleep
     * @return array
     */
    public static function get($url, $request_header = [], $retry = 3, $sleep = 1)
    {
        return self::request('GET', $url, $request_header, [], $retry, $sleep);
    }
    
    /**
     * run post requset 
     *
     * @param  $url
     * @param  $data
     * @param  $request_header
     * @param  $retry
     * @param  $sleep
     * @return array
     */
    public static function post($url, $data = [], $request_header = [], $retry = 3, $sleep = 1)
    {
        return self::request('POST', $url, $request_header, $data, $retry, $sleep);
    }

    /**
     * run put requset 
     *
     * @param  $url
     * @param  $data
     * @param  $request_header
     * @param  $retry
     * @param  $sleep
     * @return array
     */
    public static function put($url, $data = [], $request_header = [], $retry = 3, $sleep = 1)
    {
        return self::request('PUT', $url, $request_header, $data, $retry, $sleep);
    }

    /**
     * run patch requset 
     *
     * @param  $url
     * @param  $data
     * @param  $request_header
     * @param  $retry
     * @param  $sleep
     * @return array
     */
    public static function patch($url, $data = [], $request_header = [], $retry = 3, $sleep = 1)
    {
        return self::request('PATCH', $url, $request_header, $data, $retry, $sleep);
    }

    /**
     * run delete requset 
     *
     * @param  $url
     * @param  $data
     * @param  $request_header
     * @param  $retry
     * @param  $sleep
     * @return array
     */
    public static function delete($url, $data = [], $request_header = [], $retry = 3, $sleep = 1)
    {
        return self::request('DELETE', $url, $request_header, $data, $retry, $sleep);
    }

    /**
     * run curl requset 
     *
     * @param  $type
     * @param  $url
     * @param  $request_header
     * @param  $data
     * @param  $retry
     * @param  $sleep
     * @return array
     * @throws CurlException
     */
    public static function request($type, $url, $request_header = [], $data = [], $retry = 3, $sleep = 1)
    {
        $type = strtoupper($type);
        if ( ! in_array($type, array('GET', 'POST', 'PUT', 'PATCH', 'DELETE'))) {
            throw new CurlException('Invalid request type!', 1);
        }
        $ch = curl_init();
        $opt = array(
            CURLOPT_URL            => $url,
            CURLOPT_HEADER         => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST  => $type,
            CURLOPT_HTTPHEADER     => $request_header,
        );

        if ($type != 'GET') {
            $opt[CURLOPT_POSTFIELDS] = $data;
        } 

        curl_setopt_array($ch, $opt);
        // run request
        $result    = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // if failed, retry
        while (( ! $result || $http_code != 200) && (--$retry > 0)) {
            sleep($sleep);
            $result    = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }
        if ($result === false) {
            throw new CurlException('Request Failed!', 1);
        }
        // get header
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header      = substr($result, 0, $header_size);
        $content     = substr($result, $header_size);

        curl_close($ch);

        return array(
            'http_code' => $http_code,
            'header'    => $header,
            'content'   => $content,
        );
    }
}
