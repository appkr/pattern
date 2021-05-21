package study.ui;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import study.JobData;
import study.application.JobQueue;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class JobCLI {

  private Logger log = LoggerFactory.getLogger(getClass());
  private JobQueue jobQueue;

  public JobCLI(JobQueue jobQueue) {
    this.jobQueue = jobQueue;
  }

  public boolean interact() throws IOException {
    log.info("JobCLI interaction started!");

    BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));

    while(true) {
      message(">>> 원본 문자열을 입력하세요 (종료하려면 exit 를 입력하고 Enter):");
      final String source = reader.readLine();

      if (source.length() < 1) {
        error("한 문자 이상을 입력해야 합니다");
        continue;
      }

      if (source.startsWith("exit")) {
        return false;
      }

      message(">>> 변경할 문자열을 저장할 장치를 선택하세요 [file|screen]: ");
      final String target = reader.readLine();

      final JobData jobData = new JobData(source, target);
      this.jobQueue.addJob(jobData);

      return true;
    }
  }

  private void message(String message) {
    System.out.println(message);
  }

  static void error(String message) {
    System.out.println("\u001B[31m" + message + "\u001B[0m");
  }
}
