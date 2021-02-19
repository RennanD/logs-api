<?php

use Modules\APIClient\Eloquent\Models\Log;
use Modules\APIClient\Repositories\LogRespositoryInterface;

class LogsEloquentRepository implements LogRespositoryInterface {
  public function find(): array {
    $logModel = new Log();

    $logs = $logModel->orderBy('id', 'DESC')->get();

    return $logs;
  }

  public function findById(int $id): Log {
    $logModel = new Log();

    $log = $logModel->findById($id);

    return $log;
  }

  public function create(int $status_code, string $type, $body): Log {
    $logModel = new Log();

    $log = $logModel->create([
      $status_code,
      $type,
      $body
    ]);

    return $log;
  }
}
