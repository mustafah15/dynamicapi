<?php
/**
 *
 */

 namespace Mustafah15\DynamicApi;

 use Illuminate\Database\Eloquent\Collection as Collection;
 use Illuminate\Database\Eloquent\Model;

class DynamicApi
{

  private $mpper;

  private $handler;

  function __construct()
  {
      $this->mapper = new ApiMapper;
      $this->handler = new ResponceHandler;
  }



  public function respond($data,$keys=[])
  {
      if($this->isCollection($data)) {
        $mapped_data = $this->mapper->mapCollectionArray($data,$keys);
        return  $this->handler->respond($mapped_data,count($mapped_data));
      }
      elseif($this->isModel($data))
      {
        $mapped_data = $this->mapper->mapCollection($data,$keys);
        return $this->handler->respond($mapped_data,count($mapped_data));
      }
      else {
       return new \Exception( '$data must be instance of Collection or Model ');
      }
  }

  public function isCollection($data)
  {
    if($data instanceof Collection)
      return true;

    else
      return false;
  }

  public function isModel($data)
  {
      if ($data instanceof Model)
        return true;

      else
        return false;
  }
}
