<?php

use Modules\APIClient\Eloquent\Models\Log;
use Modules\APIClient\Implementations\Fakes\FakeConvertArrayToString;
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

  public function testShouldTheConvertArrayReturnsAString() {
    $logRepository = new FakeLogsRepository();
    $convertToArray = new FakeConvertArrayToString();

    $createLog = new CreateLogService($logRepository, $convertToArray);

    $createLog->run(200,"test",["foo" => "bar"]);

    $this->assertEquals('string', $convertToArray->convert(["foo" => "bar"]));
  }

  public function testShouldBeAbleToCreateANewLog(){
    $logRepository = new FakeLogsRepository();
    $convertToArray = new FakeConvertArrayToString();
    $createLog = new CreateLogService($logRepository, $convertToArray);

    $log = $createLog->run(200,"test","message-test");

    $this->assertInstanceOf(Log::class, $log['body']);
  }
}
