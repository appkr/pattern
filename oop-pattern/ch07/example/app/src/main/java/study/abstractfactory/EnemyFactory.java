package study.abstractfactory;

import study.abstractfactory.flight.boss.Boss;
import study.abstractfactory.flight.small.SmallFlight;
import study.abstractfactory.obstacle.Obstacle;

public abstract class EnemyFactory {

  public static EnemyFactory getFactory(int level) {
    if (level == 1) {
      return new EasyStageEnemyFactory();
    }

    return new HardStageEnemyFactory();
  }

  public abstract Boss createBoss();
  public abstract SmallFlight createSmallFlight();
  public abstract Obstacle createObstacle();
}
