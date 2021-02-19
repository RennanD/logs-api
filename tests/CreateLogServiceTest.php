<?php

use Modules\APIClient\Services\CreateLogService;
use Modules\APIClient\Fakes\FakeLogsRepository;

class CreateLogServiceTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testShouldNotBeAbleToCreateANewLogWithInvalidStatusCode(){
    $logRepository = new FakeLogsRepository();
    $createLog = new CreateLogService($logRepository);

    $log = $createLog->run(300,"error","message-error");


    $this->assertEquals(400, $log['status_code']);
  }
}
