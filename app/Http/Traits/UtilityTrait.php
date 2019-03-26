<?php

namespace  App\Http\Traits;

trait UtilityTrait
{
	public function ip()
	{
		$ip = '';
        $ip = $_SERVER['REMOTE_ADDR'];
        
        //checking for proxy ip and restricting local ips
        if (empty($ip) && isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $addresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($addresses as $val) {
                $val = trim($val);
                if (filter_var($val, FILTER_VALIDATE_IP) 
                    && !preg_match("#^(10\.|172\.16|192\.168|127\.0)\.#", $val)
                ) {
                    $ip = $val;
                    break;
                }
            }
        }

        //checking for client ip
        if (empty($ip)) {
            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        }

        //validating both ipv4 and ipv6
        $ip = (!filter_var($ip, FILTER_VALIDATE_IP)) ? '' : $ip;
        
        return $ip;
	}
}