package study;

import java.io.Serializable;

public class JobData implements Serializable {

  private String source;
  private String target;

  public JobData(String source, String target) {
    this.source = source;
    this.target = target;
  }

  public JobData() {
  }

  public String getSource() {
    return source;
  }

  public String getTarget() {
    return target;
  }
}
