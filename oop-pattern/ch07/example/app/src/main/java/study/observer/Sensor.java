package study.observer;

import java.util.ArrayList;
import java.util.List;

public abstract class Sensor {

  List<Display> observers = new ArrayList<>();

  void add(Display observer) {
    observers.add(observer);
  }

  void remove(Display observer) {
    observers.remove(observer);
  }

  void notifyObservers() {
    observers.forEach(o -> {
      o.update(this);
    });
  }

  public abstract int getState();

  public abstract void setState(int state);
}
