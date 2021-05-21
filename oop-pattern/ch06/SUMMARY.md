# Ch06 DI와 서비스 로케이터

## 1 어플리케이션 영역과 메인 영역
- 어플리케이션에서 사용할 객체를 교체하기 위해 메인 영역의 코드를 수정하는 것은 어플리케이션 영역에는 어떠한 변경도 요구하지 않는다
```java
public class Locator {
    private static Locator instance;
    public static Locator getInstance() {
        return instance;
    }

    public static void init(Locator locator) {
        this.instance = locator;
    }

    private JobQueue jobQueue;
    private Transcoder transcoder;

    public Locator (JobQueue jobQueue, Transcoder transcoder) {
        this.jobQueue = jobQueue;
        this.transcoder = transcoder;
    }

    public JobQueue getJobQueue() {
        return jobQueue;
    }

    public Transcoder getTranscoder() {
        return transcoder;
    }
}

public class Main {
    public static void main(String[] args) {
        // 상위 수준 모듈인 transcoder 패키지에서 사용할 하위 수준 모둘 객체 생성
        JobQueue jobQueue = new FileJobQueue();
        Transcoder transcoder = new FfmpegTranscoder();

        // 상위 수준 모듈이 하위 수준 모듈을 사용할 수 있도록 Locator 초기화
        Locator locator = new Locator(jobQueue, transcoder);
        Locator.init(locator);

        // 상위 수준 모듈 객체를 생성하고 실행
        Worker worker = new Worker();
        Thread t = new Thread(new Runnable() {
            public void run() {
                worker.run();
            }
        });

        JobCLI cli = new JobCLI();
        cli.interact();
    }
}
```

## 2 DI를 이용한 의존 객체 사용
- DI는 필요한 객체를 직접 생성하거나 찾지 않고 외부에서 넣어 주는 것
```java
public Worker {
    private JobQueue jobQueue;
    private Trandcoder transcoder;

    public Worker(JobQueue jobQueue, Transcoder transcoder) {
        this.jobQueue = JobQueue;
        this.transcoder = Transcoder;
    }
}
```
```java
public class Assembler {
    public void createAndWire() {
        JobQueue jobQueue = new FileJobQueue();
        Transcoder transcoder = new FfmpegTranscoder();
        this.worker = new Worker(jobQueue, transcoder);
        this.jobCli = new JobCLI(jobQueue);
    }
}
```
```java
public class Main {
    public static void main(String[] args) {
        Assembler assembler = new Assembler();
        assembler.createAndWire();
        Worker worker = assembler.getWorker();
        JobCLI jobCli = assembler.getJobCLI();
    }
}
```

### 2.1 생성자 방식과 설정 메서드 방식
- 생성자 방식은 생성자를 통해서 필요한 의존 객체를 전달받기 때문에, 객체를 생성하는 시점에서 의존 객체가 정상인지 확인할 수 있다

### 2.2 DI와 단위 테스트
```java
@Test
void shouldRunSuccessfully() {
    JobQueue mockJobQueue = ...; // Mock 객체 생성
    Transcoder mockTranscoder = ...; // Mock 객체 생성
    Worker worker = new Worker();
    worker.setJobQueue(mockJobQueue);
    worker.setTranscoder(mockTranscoder);
    worker.run();
}
```

### 2.3 스프링 프레임워크 예

## 3 서비스 로케이터를 이용한 의존 객체 사용
- DI를 사용할 수 없을 때 사용
- 서비스 로케이터는 어플리케이션이 필요로 하는 객체를 제공하는 책임을 갖는다
- 서비스 로케이터는 어플리케이션 영역에 위치하고, 메인에서 초기화해준다

