<?php

namespace Modules\APIClient\Services;

use Modules\APIClient\Http\Helpers\HttpResponseHelper;
use Modules\APIClient\Providers\ConvertArrayToStringInterface;
use Modules\APIClient\Repositories\LogRespositoryInterface;

class CreateLogService {

  private $logRespository;
  private $convertArrayToString;

  public function __construct(
  LogRespositoryInterface $logRespository,
  ConvertArrayToStringInterface $convertArrayToString
  ){
    $this->logRespository = $logRespository;
    $this->convertArrayToString = $convertArrayToString;
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

    if(!is_string($body)) {
      $body = $this->convertArrayToString->convert($body);
    }

    $log = $this->logRespository->create($status_code,$type,$body);

    return $httpResponse->success($log);
  }
}
