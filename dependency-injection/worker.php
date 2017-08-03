<?php

require __DIR__ . '/./vendor/autoload.php';

// DI를 이용한 구현
// 서로 다른 메모리 공간을 가진 main 프로세스와 worker 프로세스가 통신해야 하므로,
// ArrayJobQueue는 사용할 수 없고, 현재 구현에서는 FileJobQueue만 사용해야 합니다.
// JobQueue 인터페이스를 준수하는 SqsJobQueue를 구현한다면 외부 서비스도 이용할 수 있습니다.
$jobQueue = new \App\JobQueues\FileJobQueue();
$transcoder = new \App\Transcoders\RandomTranscoder();

// 의존성 교체 실험
//$transcoder = new \App\Transcoders\ReverseTranscoder();

$worker = new \App\Transcoder\JobWorker($jobQueue, $transcoder);
$worker->run();

exit(0);