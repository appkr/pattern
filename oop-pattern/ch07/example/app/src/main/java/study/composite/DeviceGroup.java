package study.composite;

import java.util.ArrayList;
import java.util.List;

public class DeviceGroup implements Device {

  List<Device> devices = new ArrayList<>();

  @Override
  public void turnOn() {
    devices.forEach(d -> d.turnOn());
  }

  @Override
  public void turnOff() {
    devices.forEach(d -> d.turnOff());
  }

  public void addDevice(Device newDevice) {
    if (newDevice == null) {
      return;
    }
    devices.add(newDevice);
  }

  public void removeDevice(Device target) {
    if (!devices.contains(target)) {
      return;
    }
    devices.remove(target);
  }
}
