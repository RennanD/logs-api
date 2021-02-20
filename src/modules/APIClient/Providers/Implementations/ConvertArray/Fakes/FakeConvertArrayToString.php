<?php
namespace Modules\APIClient\Providers\Implementations\ConvertArray\Fakes;

use Modules\APIClient\Providers\Models\ConvertArrayToStringInterface;

class FakeConvertArrayToString implements ConvertArrayToStringInterface{
  public function convert(array $array): string {
    return 'string';
  }
}
