<?php

namespace App\Http\Controllers;

use App\Services\Resource\Resource;
use Illuminate\Http\Request;
use App\Services\Resource\BitBucketResource;
use App\Services\Resource\GitResource;

class ResourcesController extends Controller
{
    public $url = "https://api.github.com/users/daogunkoya/repos";
    public $languageMap;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('resource', compact('languages', 'favorites'));

    }

    public function search(Request $request, Resource $resource)
    {
        $type = 'git';
        $user = $request->user;
        $url = 'https://api.github.com/users/'.$user.'/repos';

       // $resource = $request->type==='git'?$request->content($request->type==='git,$request->url,$request->user)
        if($type==='git'){
            $gitResource = new GitResource();
            $json = $gitResource->getContent($url,'GET');
        }else{
            $BitbucketResource = new BitBucketResource();
            $json = $BitbucketResource->getContent('$url','GET');
        }
       
        
        $row = 0;
        $languages = $resource->getLanguage($json);
        $favorites = $resource->favLanguage();
      
        return view('resource', compact('languages', 'favorites','row'));
       
    }

}
