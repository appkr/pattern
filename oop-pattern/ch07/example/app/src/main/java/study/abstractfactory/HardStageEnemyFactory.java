package study.abstractfactory;

import study.abstractfactory.flight.boss.Boss;
import study.abstractfactory.flight.boss.CloningBoss;
import study.abstractfactory.flight.boss.StrongAttackBoss;
import study.abstractfactory.flight.small.DashSmallFlight;
import study.abstractfactory.flight.small.MissileSmallFlight;
import study.abstractfactory.flight.small.SmallFlight;
import study.abstractfactory.obstacle.BombObstacle;
import study.abstractfactory.obstacle.Obstacle;
import study.abstractfactory.obstacle.RockObstacle;

public class HardStageEnemyFactory extends EnemyFactory {

  @Override
  public Boss createBoss() {
    return new CloningBoss(5, 20);
  }

  @Override
  public SmallFlight createSmallFlight() {
    return new MissileSmallFlight(1, 1);
  }

  @Override
  public Obstacle createObstacle() {
    return new BombObstacle();
  }
}
