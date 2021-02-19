<?php
namespace Modules\APIClient\Implementations\Fakes;

use Modules\APIClient\Providers\ConvertArrayToStringInterface;

class FakeConvertArrayToString implements ConvertArrayToStringInterface{
  public function convert(array $array): string {
    return 'string';
  }
}
