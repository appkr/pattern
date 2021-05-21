package study.observer;

public class HumiditySensor extends Sensor {

  int state;

  @Override
  public int getState() {
    return state;
  }

  @Override
  public void setState(int newState) {
    this.state = newState;
  }
}
