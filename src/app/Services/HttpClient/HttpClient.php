<?php
namespace App\Services\HttpClient;
use App\Contracts\HttpClientContract;
class HttpClient implements HttpClientContract{

public $url;
public $content;

    public function __construct($url,$type,$data = null){
        $this->url = $url;
        if($type === 'GET'){
            $this->getRequest();
        }
        
    }

    public function getRequest(){
        //$url= config('curl.url').$this->user.'/repos';
        
        try{
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'My User Agent');
            $this->content = json_decode(curl_exec($ch), true);
            curl_close($ch);
        }catch(PDOEXECEPTION $e){

        }
      
       // return $this->content;
    }

    public function __get($content){
       $this->content = $content;
    }
}

?>