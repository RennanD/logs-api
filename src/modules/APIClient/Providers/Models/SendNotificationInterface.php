<?php

use Modules\APIClient\Eloquent\Models\Notification;

interface SendNotificationInterface {
  public function send(): Notification;
}
