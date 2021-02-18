<?php

use Illuminate\Database\Eloquent\Model;

class Log extends Model {
  /**
   * @var array
   */
  protected $fillable = [
    'status_code', 'type', 'body'
  ];

}
