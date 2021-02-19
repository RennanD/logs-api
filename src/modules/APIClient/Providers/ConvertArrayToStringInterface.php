<?php
namespace Modules\APIClient\Providers;

interface ConvertArrayToStringInterface {
  public function convert(array $array): string;
}
