package study;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import study.application.JobQueue;
import study.application.Transcoder;
import study.application.Worker;
import study.application.queue.FileJobQueue;
import study.application.queue.InMemoryJobQueue;
import study.application.transcoder.ReverseTranscoder;
import study.application.transcoder.ShuffleTranscoder;
import study.ui.JobCLI;

import java.io.IOException;

public class App {

  private static Logger log = LoggerFactory.getLogger(App.class);

  public static void main(String[] args) throws IOException {
    log.info("application started!");

//    JobQueue jobQueue = new FileJobQueue("filequeue.txt");
    Transcoder transcoder = new ReverseTranscoder();

    JobQueue jobQueue = new InMemoryJobQueue();
//    Transcoder transcoder = new ShuffleTranscoder();

    Worker worker = new Worker(jobQueue, transcoder);
    final Thread t = new Thread(() -> {
      try {
        worker.run();
      } catch (InterruptedException e) {
      }
    });
    t.start();

    JobCLI ui = new JobCLI(jobQueue);
    while(ui.interact()) {};
    t.interrupt();
  }
}
