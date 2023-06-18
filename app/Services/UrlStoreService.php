<?php

namespace App\Services;

class UrlStoreService
{
    private $sessionKey = 'urlData';

    public function setData($url){
        $data = $this->getData();
        $data[] = $url;
        session()->put($this->sessionKey, $data);
    }

    public function getData(): array {
        $data = session()->get($this->sessionKey);
        return (is_array($data)) ? $data : [];
    }

    public function getLastItems(int $count = 10){

        $data = $this->getData();
        if(count($data) > $count){
            $count = -1*$count;
            $data = array_slice($data, $count);
        }
        return array_reverse($data);
    }

    public function resetData(){
        session()->forget($this->sessionKey);
    }
}
