<?php
class ServiceDetails {
    public $username;
    public $password;
    public $api_endpoint;

    public function __construct( $username, $password, $api_endpoint ) {
        $this->username     = $username;
        $this->password     = $password;
        $this->api_endpoint = $api_endpoint;
    }
}

class API {

    public $service_details;

    public function __construct( ServiceDetails $service_details ) {
        $this->service_details = $service_details;
    }

}


class SpecificAPI extends API {

    public function getRecord( $record_id ) {
        $service_details = $this->service_details;
        $endpoint        = $service_details->api_endpoint;
        $username        = $service_details->username;
        $password        = $service_details->password;

        $url = "{$endpoint}/articles?nb_items=3";

        // create obj to pass - even needed?
        // should be a factory?
        $request = new RequestDetails( $url, $username, $password );

        //should be another factory?
        $return = new ServiceGetRequest( $request );

        return $return->result;
    }
}


class RequestDetails {
    public $url;
    public $username;
    public $password;
    public $content;

    public function __construct( $url, $username, $password, $content = '' ) {
        $this->url      = $url;
        $this->username = $username;
        $this->password = $password;
        $this->content  = $content;
    }
}


class ServiceRequest {

    public $result = [ ];

    public function __construct( RequestDetails $service_details ) {
        $this->executeRequest( $service_details );
    }

    // Stub for extends
    public function initialiseOptions( RequestDetails $service_details ) {
        $options = array();

        return $options;
    }

    public function executeRequest( RequestDetails $service_details ) {
        $options = $this->initialiseOptions( $service_details );
        $url     = $service_details->url;

        $ch = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $result = curl_exec( $ch );
        curl_close( $ch );

        $result       = json_decode( $result, true );
        $this->result = $result;
    }
}

class ServicePostRequest extends ServiceRequest {

    public function initialiseOptions( RequestDetails $service_details ) {
        $username = $service_details->username;
        $password = $service_details->password;
        $json     = json_encode( $service_details->content );

        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD        => "{$username}:{$password}",
            CURLOPT_HTTPHEADER     => array( "Content-type: application/json" ),
            CURLOPT_POSTFIELDS     => $json
        );

        return $options;
    }
}

class ServiceGetRequest extends ServiceRequest {

    public function initialiseOptions( RequestDetails $service_details ) {
        $username = $service_details->username;
        $password = $service_details->password;

        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD        => "{$username}:{$password}",
            CURLOPT_HTTPHEADER     => array( "Accept: application/json" ),
            CURLOPT_SSL_VERIFYPEER => false
        );

        return $options;
    }
}


?>