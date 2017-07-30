<?php

require __DIR__ . '/./vendor/autoload.php';

// Locator를 이용한 구현
$jobQueue = new \App\JobQueues\CollectionJobQueue();
$transcoder = new \App\Transcoders\RandomTranscoder();

// 의존성 교체 실험
//$jobQueue = new \App\JobQueues\FileJobQueue();
//$transcoder = new \App\Transcoders\ReverseTranscoder();

\App\Transcoder\Locator::init($jobQueue, $transcoder);

// pthreads 확장 모듈을 사용하지 않는 한, PHP는 싱글 쓰레드로 작동합다. 따라서
// 아래 아래 코드처럼 Worker를 메인 쓰레드에서 분리하는 것은 불가능하고,
// 여러 Worker Node를 이용해 병렬 처리할 수도 없습니다.

// JobQueue를 이용한 구현은 별 의미가 없을 수 있습니다.
// 그럼에도 불구하고, 외부에 존재하는 메시지 큐 서비스(e.g. Gearman, SQS 등)를 이용해서
// 별도 프로세스에서 시간이 오래 걸리는 작업을 시뮬레이션 한다는 의미에서
// JobQueue의 용도를 확장해서 생각해 볼 수 있습니다.

//$worker = new \App\Transcoder\Worker();
//$worker->run();

$cli = new \App\Ui\JobCli();
$cli->interact();

exit(0);