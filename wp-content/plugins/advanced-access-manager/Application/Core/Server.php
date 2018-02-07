<?php

/**
 * ======================================================================
 * LICENSE: This file is subject to the terms and conditions defined in *
 * file 'license.txt', which is part of this source code package.       *
 * ======================================================================
 */

/**
 * AAM server
 * 
 * Connection to the external AAM server.
 * 
 * @package AAM
 * @author Vasyl Martyniuk <vasyl@vasyltech.com>
 */
final class AAM_Core_Server {

    /**
     * Server endpoint
     */
    const SERVER_URL = 'https://aamplugin.com/api/v1';
    
    /**
     * Fetch the extension list
     * 
     * Fetch the extension list with versions from the server
     * 
     * @return array
     * 
     * @access public
     */
    public static function register() {
        //prepare check params
        $params = array(
            'domain'  => parse_url(site_url(), PHP_URL_HOST), 
            'version' => AAM_Core_API::version(),
            'uid'     => AAM_Core_API::getOption('aam-uid', null, 'site')
        );
        
        self::send('/register', $params);
    }

    /**
     * Fetch the extension list
     * 
     * Fetch the extension list with versions from the server
     * 
     * @return array
     * 
     * @access public
     */
    public static function check() {
        //prepare check params
        $params = array(
            'domain'  => parse_url(site_url(), PHP_URL_HOST), 
            'version' => AAM_Core_API::version(),
            'uid'     => AAM_Core_API::getOption('aam-uid', null, 'site')
        );
        
        $response = self::send('/check', $params);
        $result   = array();
        
        if (!is_wp_error($response) && is_object($response)) {
            //WP Error Fix bug report
            if ($response->error !== true && !empty($response->products)) {
                $result = $response->products;
            }
        }

        return $result;
    }

    /**
     * Download the extension
     * 
     * @param string $license
     * 
     * @return base64|WP_Error
     * 
     * @access public
     */
    public static function download($license) {
        $domain = parse_url(site_url(), PHP_URL_HOST);

        $response = self::send(
                '/download', 
                array(
                    'license' => $license, 
                    'domain'  => $domain,
                    'uid'     => AAM_Core_API::getOption('aam-uid', null, 'site')
                )
        );
        
        if (!is_wp_error($response)) {
            if ($response->error === true) {
                $result = new WP_Error($response->code, $response->message);
            } else {
                $result = $response;
            }
        } else {
            $result = $response;
        }

        return $result;
    }
    
    /**
     * Send request
     * 
     * @param string $request
     * 
     * @return stdClass|WP_Error
     * 
     * @access protected
     */
    protected static function send($request, $params, $timeout = 10) {
        $response = self::parseResponse(
                AAM_Core_API::cURL(
                        self::SERVER_URL . $request, false, $params, $timeout
                )
        );
        
        return $response;
    }
    
    /**
     * 
     * @param type $response
     */
    protected static function parseResponse($response) {
        if (!is_wp_error($response)) {
            if ($response['response']['code'] == 200) {
                $response = json_decode($response['body']);
                if (empty($params['uid']) && isset($response->uid)) {
                    AAM_Core_API::updateOption('aam-uid', $response->uid, 'site');
                }
            } else {
                $response = new WP_Error(
                        $response['response']['code'], 
                        $response['response']['message'] . ':' . $response['body']
                );
            }
        }
        
        return $response;
    }

}