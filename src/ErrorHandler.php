<?php

namespace Mustafah15\DynamicApi;

use Exception;
use RuntimeException;
/**
 *
 */



class ErrorHandler
{

  public static function handle($exception,
   $code = 0,
   $status = 500,
   $options = 0)
  {
    if (is_string($exception)) {
            $message = $exception;
        }
        elseif ($exception instanceof Exception || $exception instanceof RuntimeException) {
            $code = $exception->getCode();
            $message = $exception->getMessage();
        }
        else {
            throw new Exception("first argument must be instance of Exception ", 1);
        }
        $response = [
            'status' => $status,
            'error' => compact('message', 'code'),
        ];
  }

}


 ?>
