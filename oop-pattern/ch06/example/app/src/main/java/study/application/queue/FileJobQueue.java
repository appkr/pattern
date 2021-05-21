package study.application.queue;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import study.JobData;
import study.application.JobQueue;

import java.io.*;
import java.util.ArrayList;
import java.util.List;

public class FileJobQueue implements JobQueue {

  private Logger log = LoggerFactory.getLogger(getClass());
  private String filename;

  public FileJobQueue(String filename) {
    this.filename = filename;
  }

  @Override
  public void addJob(JobData jobData) {
    final String path = getClass().getClassLoader().getResource(filename).getPath();
    log.info("addJob to {}", path);

    try (ObjectOutputStream oos = new ObjectOutputStream(new FileOutputStream(new File(path)))) {
      oos.writeObject(jobData);
    } catch (IOException e) {
      log.error("{}", e);
    }
  }

  @Override
  public JobData getJob() {
    final String path = getClass().getClassLoader().getResource(filename).getPath();
    log.info("getJob from {}", path);

    JobData jobData = null;
    try (ObjectInputStream ois = new ObjectInputStream(new FileInputStream(new File(path)));
         FileOutputStream fos = new FileOutputStream(filename);) {
      // 첫 객체만 꺼낸다
      jobData = (JobData) ois.readObject();

      JobData rest;
      List<JobData> temp = new ArrayList();
      while ((rest = (JobData) ois.readObject()) != null) {
        // 나머지 객체들은 역직렬하고 임시 변수에 담는다
        temp.add(rest);
      }

      // 파일 내용을 전부 지우고 임수 변수에 담긴 객체를 다시 직렬화해서 쓴다
      fos.write("".getBytes());
      temp.forEach(r -> {
        addJob(r);
      });
    } catch (EOFException e) {
      // do nothing
    } catch (Exception e){
      log.error("{}", e);
    }

    return jobData;
  }
}
