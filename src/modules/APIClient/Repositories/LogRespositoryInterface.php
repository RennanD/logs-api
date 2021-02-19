<?php

namespace Modules\APIClient\Repositories;

use Modules\APIClient\Eloquent\Models\Log;

interface LogRespositoryInterface {
  /**
   * @return Modules\APIClient\Eloquent\Models\Log[]
   */
  public function find(): array;

  public function findById(int $id): Log;

  public function create(int $status_code, string $type, $body): Log;

}
