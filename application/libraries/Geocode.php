<?php

class Geocode {

    function getgeoaddress($zipcode) {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $zipcode . "&sensor=false";
        $result = file_get_contents("$url");
        $json = json_decode($result);
        $i = 0;
        $array = array();
        foreach ($json->results as $result) {
            foreach ($result->address_components as $addressPart) {
                if ((in_array('locality', $addressPart->types)) && (in_array('political', $addressPart->types)))
                    $array[$i]['city'] = $addressPart->long_name;
                else if ((in_array('administrative_area_level_1', $addressPart->types)) && (in_array('political', $addressPart->types)))
                    $array[$i]['state'] = $addressPart->long_name;
                else if ((in_array('country', $addressPart->types)) && (in_array('political', $addressPart->types)))
                    $array[$i]['country'] = $addressPart->long_name;
            }
            $i++;
        }
        return $array;
    }

}
