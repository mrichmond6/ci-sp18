<?php
//application/models/Pics_model/index.php
class Pics_Model extends CI_Model{
  public function __construct()
  {
    
  }
  public function get_pics($tag = 'kittens')
  {
    // API key =
    $api_key ='d8bfb471778d665af4580c19a04e1f88';
    $perPage = 25;
    $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
    $url.= '&api_key=' . $api_key;
    $url.= '&tags=' . $tag;
    $url.= '&per_page=' . $perPage;
    $url.= '&format=json';
    $url.= '&nojsoncallback=1';
    
    if($tag === 'kittens' || $tag === 'puppies' || $tag === 'foals' || $tag === 'babies') 
    {
      $response = json_decode(file_get_contents($url));
      return $response;
    } else {
      $response = false;
      return $response;
    }
  }
}