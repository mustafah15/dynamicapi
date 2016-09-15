<?php

namespace Mustafah15\DynamicApi;

/**
 *
 */
 use Illuminate\Support\Facades\Response as Response;


class ResponceHandler
{


  public function respond(
  array $data ,
  $total = null,
  $status = 200)
  {
    $responce=[
      'data'=>$data,
      'status'=>$status
    ];
    if(!is_null($total))
      $responce['total'] = $total;
    return Response::json($responce);
  }


}



 ?>
