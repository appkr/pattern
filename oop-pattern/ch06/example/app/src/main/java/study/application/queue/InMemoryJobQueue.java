package study.application.queue;

import study.JobData;
import study.application.JobQueue;

import java.util.ArrayList;
import java.util.List;

public class InMemoryJobQueue implements JobQueue {

  private List<JobData> queue = new ArrayList();

  @Override
  public void addJob(JobData jobData) {
    queue.add(jobData);
  }

  @Override
  public JobData getJob() {
    if (queue.isEmpty()) {
      return null;
    }
    return queue.remove(0);
  }
}
