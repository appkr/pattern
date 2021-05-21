package study.composite;

public interface Device {

  default void turnOn() {
    System.out.println(getName() + "을/를 켭니다");
  }

  default void turnOff() {
    System.out.println(getName() + "을/를 끕니다");
  }

  default String getName() {
    return getClass().getSimpleName();
  }
}
