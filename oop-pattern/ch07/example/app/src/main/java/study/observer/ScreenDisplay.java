package study.observer;

public class ScreenDisplay implements Display {

  @Override
  public void update(Sensor observable) {
    String output = (observable instanceof HumiditySensor)
        ? String.format("현재 습도는 %d%% 입니다", observable.getState())
        : String.format("현재 온도는 %d°C 입니다", observable.getState());

    System.out.println(output);
  }
}
