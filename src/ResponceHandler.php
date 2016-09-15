<?php

namespace Mustafah15\DynamicApi;

/**
 *
 */


class ResponceHandler
{


  public function respond(
  array $data ,
  $total = null,
  $page_number = null,
  $status = 200,
  $headers = [])
  {
    $responce[
      'data'=>$data,
      'status'=>$status
    ];

    if(!is_null($total))
      $responce['total'] = $total;

    if(!is_null($page_number))
      $responce['page_number'] = $page_number;

    return Responce::json($responce);
  }


}



 ?>
