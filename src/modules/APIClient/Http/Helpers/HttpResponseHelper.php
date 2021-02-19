<?php

namespace Modules\APIClient\Http\Helpers;

class HttpResponseHelper {

  public function badRequest(string $message) {

    $response = [
      "status_code" => 400,
      "body" => $message
    ];



    return $response;
  }

  public function success($body) {
    $response = [
      "status_code" => 200,
      "body" => $body
    ];

    return $response;
  }
}
