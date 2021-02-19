<?php

namespace Modules\APIClient\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {

  public int $id;
  public int $status_code;
  public string $type;
  public $body;

  public function __construct() {

  }

  /**
   * @var array
   */
  protected $fillable = [
    'status_code', 'type', 'body'
  ];

  public function setLog($id, $status_code, $type, $body) {
    $this->id = $id;
    $this->status_code = $status_code;
    $this->type = $type;
    $this->body = $body;

    return new Log();
  }

}
