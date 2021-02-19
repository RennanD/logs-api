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
    $httpResponse = new HttpResponseHelper();

    if(!in_array($status_code, $permitedStatus)) {
      return $httpResponse->badRequest('Invalid status code.');
    }


    return $httpResponse->success('Success');
  }
}
