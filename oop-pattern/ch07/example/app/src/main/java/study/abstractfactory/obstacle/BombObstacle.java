package study.abstractfactory.obstacle;

public class BombObstacle extends Obstacle {

  @Override
  public void block() {
    System.out.println("폭탄 붐!!");
  }
}
