<?php
/* Class for cURL Requests with PHP*/
class Request{

  private $_curl;
  private $_url;

  public function __construct ($url)
  {
    $this->_url = $url;
    $this->_curl = curl_init();
  }

  // Get all results from an url
  public function getResults(){
    curl_setopt_array( $this->_curl, array(
        CURLOPT_RETURNTRANSFER => 1, // Return the response as a string
        CURLOPT_URL => $this->_url,
        CURLOPT_SSL_VERIFYPEER => false // trust in server’s HTTPS certificate
    ));

    // Send the request and save response to $jobs
    if( !$jobs = curl_exec($this->_curl) ){
        die('Error: "' . curl_error($this->_curl) . '" - Code: ' . curl_errno($this->_curl));
    }
    $jobs = json_decode($jobs, true);
    $jobs = $jobs ["jobs"];

    $this->_close(); // close connection

    return $jobs;
  }

  // Close request
  private function _close(){
    curl_close($this->_curl);
  }

}
