<?php

namespace app\Traits;

//response formatter
trait ApiResponseFormatter
{
   public function apiResponse($code = 200, $message = "success", $data = [])
   {
      //dari parameter akan diformat menjadi seperti di bawah ini,
      return json_encode([
         "code" => $code,
         "message" => $message,
         "data" => $data
      ]);
   }
}