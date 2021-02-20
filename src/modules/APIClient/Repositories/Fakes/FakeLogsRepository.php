<?php

namespace Modules\APIClient\Repositories\Fakes;

use Modules\APIClient\Eloquent\Models\Log;
use Modules\APIClient\Repositories\LogRespositoryInterface;

class FakeLogsRepository implements LogRespositoryInterface {

  private $logs = [];

  public function find(): array {

    return $this->logs;
  }

  public function findById(int $id): Log {

    $logIndex = array_search($id, array_column($this->logs, 'id'));

    return $this->logs[$logIndex];
  }

  public function create(int $status_code, string $type, $body): Log {
    $logModel = new Log();

    $log = $logModel->setLog();

    return $log;
  }
}
