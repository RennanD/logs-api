<?php

use Modules\APIClient\Eloquent\Models\Log;
use Modules\APIClient\Providers\Implementations\ConvertArray\Fakes\FakeConvertArrayToString;
use Modules\APIClient\Services\CreateLogService;
use Modules\APIClient\Repositories\Fakes\FakeLogsRepository;

class CreateLogServiceTest extends TestCase {

  public function testShouldNotBeAbleToCreateANewLogWithInvalidStatusCode(){
    $logRepository = new FakeLogsRepository();
    $convertToArray = new FakeConvertArrayToString();
    $createLog = new CreateLogService($logRepository, $convertToArray);

    $log = $createLog->run(300,"error","message-error");


    $this->assertEquals(400, $log['status_code']);
  }

  public function testShouldNotBeAbleToCreateANewLogWithInvalidType(){
    $logRepository = new FakeLogsRepository();
    $convertToArray = new FakeConvertArrayToString();
    $createLog = new CreateLogService($logRepository, $convertToArray);

    $log = $createLog->run(200,"warning","message-test");

    $this->assertEquals(400, $log['status_code']);
  }

  public function testShouldBeAbleToConvertArrayBodyInAString(){
    $logRepository = new FakeLogsRepository();

    $convertToArrayMock = $this->createMock(FakeConvertArrayToString::class);
    $convertToArrayMock->expects($this->once())->method('convert');

    $createLog = new CreateLogService($logRepository, $convertToArrayMock);

    $createLog->run(200,"test",["foo" => "bar"]);

  }

  public function testShouldAbleToSendANotificationWhenThrows() {
    $logRepository = new FakeLogsRepository();
    $convertToArray = new FakeConvertArrayToString();

    $sendNotificationMock = $this->createMock(FakeSendNotification::class);
    $sendNotificationMock->expects($this->once())->method('send');

    $createLog = new CreateLogService($logRepository, $convertToArray, $sendNotificationMock);
  }

  public function testShouldBeAbleToCreateANewLog(){
    $logRepository = new FakeLogsRepository();
    $convertToArray = new FakeConvertArrayToString();
    $createLog = new CreateLogService($logRepository, $convertToArray);

    $log = $createLog->run(200,"test","message-test");

    $this->assertInstanceOf(Log::class, $log['body']);
  }
}
