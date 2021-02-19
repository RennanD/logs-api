<?php
namespace Modules\APIClient\Implementations;

use Modules\APIClient\Providers\ConvertArrayToStringInterface;

class EncodeConvertArrayToString implements ConvertArrayToStringInterface{
  public function convert(array $array): string {
    return json_encode($array);
  }
}
