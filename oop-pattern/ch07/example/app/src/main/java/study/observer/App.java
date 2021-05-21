package study.observer;

import java.util.Random;

public class App {

  public static void main(String[] args) {
    Sensor sensor1 = new TemperatureSensor();
    sensor1.add(new ScreenDisplay());
    sensor1.add(new LogDisplay("app/src/main/resources/log.txt"));

    Sensor sensor2 = new HumiditySensor();
    sensor2.add(new ScreenDisplay());
    sensor2.add(new LogDisplay("app/src/main/resources/log.txt"));

    while (true) {
      int temperature = new Random().nextInt(5) + 15;
      int humidity = new Random().nextInt(10) + 30;

      sensor1.setState(temperature);
      sensor1.notifyObservers();

      sensor2.setState(humidity);
      sensor2.notifyObservers();

      try {
        Thread.sleep(1_000);
      } catch (InterruptedException e) {}
    }
  }
}
