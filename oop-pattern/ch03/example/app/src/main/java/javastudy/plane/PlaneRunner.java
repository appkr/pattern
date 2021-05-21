package javastudy.plane;

public class PlaneRunner {

  public static void main(String[] args) {
    final TurboPlane plane = new TurboPlane();
    System.out.println("현재 속도는 " + plane.fly() + " 입니다");
    System.out.println("부스트를 가동합니다");
    System.out.println("현재 속도는 " + plane.boost() + " 입니다");
  }
}
