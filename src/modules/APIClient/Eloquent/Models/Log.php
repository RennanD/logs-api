<?php

namespace Modules\APIClient\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'status_code', 'type', 'body'
  ];

  public function setLog() {
    return $this;
  }

}
