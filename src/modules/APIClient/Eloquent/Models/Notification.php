<?php

namespace Modules\APIClient\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'status_code', 'type', 'message', 'console'
  ];


}
