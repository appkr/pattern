package javastudy.plane;

public class TurboPlane extends Plane implements Turbo {

  @Override
  public int boost() {
    return 150;
  }
}
