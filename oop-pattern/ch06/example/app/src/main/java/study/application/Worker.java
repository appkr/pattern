package study.application;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import study.JobData;
import study.ui.Target;
import study.ui.target.FileTarget;
import study.ui.target.ScreenTarget;

public class Worker {

  private Logger log = LoggerFactory.getLogger(getClass());
  private JobQueue jobQueue;
  private Transcoder transcoder;

  public Worker(JobQueue jobQueue, Transcoder transcoder) {
    this.jobQueue = jobQueue;
    this.transcoder = transcoder;
  }

  public void run() throws InterruptedException {
    log.info("worker thread started!");

    while (true) {
      //'JobQueue에서 JobData를 읽는다
      final JobData jobData = jobQueue.getJob();
      if (jobData != null) {
        //'Transcoder에게 작업을 위임하고 결과를 받는다
        final String transcoded = transcoder.transcode(jobData.getSource());

        //'결과 출력을 Target에게 위임한다
        String temp = jobData.getTarget();
        Target target = null;
        switch (temp) {
          case "screen":
            target = new ScreenTarget();
            break;
          case "file":
            target = new FileTarget("output.txt");
            break;
          default:
            throw new IllegalArgumentException();
        }

        target.flush(transcoded);
      }

      Thread.sleep(1);
    }
  }
}
