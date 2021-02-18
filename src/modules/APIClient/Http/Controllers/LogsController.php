<?php

namespace Modules\APIClient\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class LogsController extends Controller{
  public function index() {
    return response()->json([
      "message" => "ok"
      ]);
    }
  }
