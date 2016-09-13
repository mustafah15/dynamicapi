<?php

namespace Mustafah15\DynamicApi;
/**
 *
 */
class ApiMapper
{

  protected $mapped;

  function __construct()
  {
    $this->mapped = array();
  }


  public function mapCollection($collection,$keys = array())
  {
      $this->mapped =  $collection->toArray();

      if(empty($keys))
        return $this->mapped;

      else
        return $this->getSpacificKeys($keys);
  }

  public function getSpacificKeys($keys)
  {

    $this->mapped = array_intersect_key($this->mapped, array_flip($keys));

    return $this->mapped;
  }


  public function mapCollectionArray($collection_arr, $keys = array())
  {
      if(empty($keys))
         $this->handleCollections($collection_arr);
      else
         $this->handleCollectionsWithSpecificKeys($collection_arr,$keys);

         return $this->mapped;
  }

  public function handleCollectionsWithSpecificKeys($collection_arr,$keys)
  {
      $data = [];
      foreach ($collection_arr as $collection)
          $data[] = $this->mapCollection($collection,$keys);

     $this->mapped = $data;
  }

  public function handleCollections($collection_arr)
  {
    $data = [];
      foreach ($collection_arr as $collection)
          $data[] = $this->mapCollection($collection);

    $this->mapped = $data;
  }
}
