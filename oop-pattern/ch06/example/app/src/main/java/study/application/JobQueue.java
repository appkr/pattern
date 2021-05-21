package study.application;

import study.JobData;

public interface JobQueue {

  void addJob(JobData jobData);
  JobData getJob();
}
