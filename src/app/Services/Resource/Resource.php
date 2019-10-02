<?php

namespace App\Services\Resource;

use App\Contracts\ResourceTypeContract;
use App\Contracts\ResourceContract;
use App\Services\HttpClient\HttpClient as Client;

class Resource implements ResourceContract
{

    public $languageMap;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __constructor(){

    //  }
    public function getContent(ResourceTypeContract $resource,$url,$user)
    {
      
        return $resource->getContent($url,$user)??[];
    }

    public function getLanguage($json)
    {
        if (is_array($json)) {
            $languages = [];
            foreach ($json as $key => $repo) {
                $allLanguages[$key] = $repo['language'];

                $language = $repo['language'];
                $languages[$language] = isset($languages[$language]) ? $languages[$language] + 1 : 1;
            }

            $this->languageMap = $languages;
            return $languages;
        }
        return null;

    }

    public function favLanguage()
    {
        if (is_array($this->languageMap)) {
            reset($this->languageMap);
            $first_key = key($this->languageMap);

            $max = $this->languageMap[$first_key];
            $index = 0;
            $langMax = [];

            foreach ($this->languageMap as $key => $value) {

                if ($this->languageMap[$key] > $max) {
                    $max = $this->languageMap[$key];
                    $langMax[] = $key;
                    $index = $key;
                }

            }
            return $langMax;
        }
        return [];

    }
}
