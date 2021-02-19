<?php

use Modules\APIClient\Services\CreateLogService;
use Modules\APIClient\Fakes\FakeLogsRepository;

class CreateLogServiceTest extends TestCase {

  public function testShouldNotBeAbleToCreateANewLogWithInvalidStatusCode(){
    $logRepository = new FakeLogsRepository();
    $createLog = new CreateLogService($logRepository);

    $log = $createLog->run(300,"error","message-error");


    $this->assertEquals(400, $log['status_code']);
  }

  public function testShouldNotBeAbleToCreateANewLogWithInvalidYype(){
    $logRepository = new FakeLogsRepository();
    $createLog = new CreateLogService($logRepository);

    $log = $createLog->run(200,"warning","message-test");

    $this->assertEquals(400, $log['status_code']);
  }
}
