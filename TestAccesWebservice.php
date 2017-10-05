<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

try {
    $wsdl_url = 'http://www.webservicex.com/globalweather.asmx?wsdl';
    $client = new SOAPClient($wsdl_url);
    $params = array(
        'CountryName' => "France",
    );
    $return = $client->GetCitiesByCountry($params);
    print_r($return);
} catch (Exception $e) {
    echo "Exception occured: " . $e;
}
