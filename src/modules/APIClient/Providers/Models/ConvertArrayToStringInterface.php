<?php
namespace Modules\APIClient\Providers\Models;

interface ConvertArrayToStringInterface {
  public function convert(array $array): string;
}
