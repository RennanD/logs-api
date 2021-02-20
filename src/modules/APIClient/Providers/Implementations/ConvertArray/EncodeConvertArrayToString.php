<?php
namespace Modules\APIClient\Providers\Implementations\ConvertArray;

use Modules\APIClient\Providers\Models\ConvertArrayToStringInterface;

class EncodeConvertArrayToString implements ConvertArrayToStringInterface{
  public function convert(array $array): string {
    return json_encode($array);
  }
}
