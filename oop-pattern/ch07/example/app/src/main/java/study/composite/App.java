package study.composite;

public class App {

  public static void main(String[] args) {
    DeviceGroup deviceGroup = new DeviceGroup();
    deviceGroup.addDevice(new Aircon());
    deviceGroup.addDevice(new Light());
    deviceGroup.addDevice(new Tv());

    deviceGroup.turnOn();
    deviceGroup.turnOff();
  }
}
