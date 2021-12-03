<?php
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


    class Book{
        private $response;
        function __construct()
        {
        
            
        }

        public function callApi($url)
        {
            $curl = curl_init();
            
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($curl);

            if($e = curl_error($curl)){
                echo $e;
            }else{
                $decoded = json_decode($res, true);
                return $decoded;
            }
            curl_close($curl);
        }

        
        public function fetchBooks($name)
        {
            $url = "https://www.anapioficeandfire.com/api/books";
            if ($name) {
                $url = "https://www.anapioficeandfire.com/api/books?name=$name";
            }
            $data = $this->callApi($url);
            return $data; 
        }
        
    }

?>