<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library("Geocode");
        $this->load->helper("URL");
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    public function getgeo() {
        $zipcode = $this->input->post('zipcode');
        $result = $this->geocode->getgeoaddress($zipcode);
        if (!empty($result)) {
            $str = "";
            foreach ($result as $val) {
                $city = isset($val['city']) ? $val['city'] : "N/A";
                $state = isset($val['state']) ? $val['state'] : "N/A";
                $country = $val['country'] ? $val['country'] : "N/A";
                $str.="<div class='divdata'>City : " . $city . "<br/>State : " . $state . "<br/>Country : " . $country . "</div>";
            }
            echo $str;
        } else {
            echo "There is no address found";
        }
        exit;
    }

}
