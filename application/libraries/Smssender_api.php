<?php

/**	SMSSender_API Class
 *		- Date Created: 2019-02-07 12:28 AM
 *		- Author: Jenelyn C. Contillo
 */


class SMSSender_API {

    protected $url_link = "https://sendersmsserver.000webhostapp.com/api/add_sms";
    protected $site_key = "072f15a896c80fea00c43649098d55ac";
    static function addSms($recipient,$message){
        
        $curl_connection = curl_init("https://sendersmsserver.000webhostapp.com/api/add_sms");
        curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

        $post_data = array();

		//recipient format = 639xxxxxxxxx
        $post_data['recipient'] = $recipient;
        $post_data['message'] = $message;
		$post_data['system_code'] = "072f15a896c80fea00c43649098d55ac";

		$post_items = array();
		foreach ( $post_data as $key => $value)
        {
            $post_items[] = $key . '=' . $value;
        }
		$post_string = implode ('&', $post_items);
		
		curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
		$result = curl_exec($curl_connection);
		
		curl_close($curl_connection);
		
		print_r($result);

		if($result != "")
            return json_decode($result);

		return false;

		exit;
		
	}
	

}
?>