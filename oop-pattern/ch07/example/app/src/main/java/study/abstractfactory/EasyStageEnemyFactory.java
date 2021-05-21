package study.abstractfactory;

import study.abstractfactory.flight.boss.Boss;
import study.abstractfactory.flight.boss.StrongAttackBoss;
import study.abstractfactory.flight.small.DashSmallFlight;
import study.abstractfactory.flight.small.SmallFlight;
import study.abstractfactory.obstacle.Obstacle;
import study.abstractfactory.obstacle.RockObstacle;

public class EasyStageEnemyFactory extends EnemyFactory {

  @Override
  public Boss createBoss() {
    return new StrongAttackBoss(1, 10);
  }

  @Override
  public SmallFlight createSmallFlight() {
    return new DashSmallFlight(1, 1);
  }

  @Override
  public Obstacle createObstacle() {
    return new RockObstacle();
  }
}
