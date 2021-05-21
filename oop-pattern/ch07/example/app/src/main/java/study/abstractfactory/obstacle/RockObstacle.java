package study.abstractfactory.obstacle;

public class RockObstacle extends Obstacle {

  @Override
  public void block() {
    System.out.println("충돌 쾅!!");
  }
}
