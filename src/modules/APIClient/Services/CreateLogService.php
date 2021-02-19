<?php

namespace Modules\APIClient\Services;

use Modules\APIClient\Http\Helpers\HttpResponseHelper;
use Modules\APIClient\Repositories\LogRespositoryInterface;

class CreateLogService {

  private $logRespository;

  public function __construct(LogRespositoryInterface $logRespository) {
    $this->logRespository = $logRespository;
  }

  public function run(int $status_code, string $type, $body) {

    $permitedStatus = [200,400,401,500];
    $permitedTypes = ["error","success","test"];
    $httpResponse = new HttpResponseHelper();

    if(!in_array($status_code, $permitedStatus)) {
      return $httpResponse->badRequest('Invalid status code.');
    }

    if(!in_array($type, $permitedTypes)) {
      return $httpResponse->badRequest('Invalid type for the log.');
    }

    return $httpResponse->success('Success');
  }
}
