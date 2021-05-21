package study.abstractfactory;

import study.abstractfactory.flight.EnemyFlight;
import study.abstractfactory.flight.boss.Boss;
import study.abstractfactory.obstacle.Obstacle;

import java.util.ArrayList;
import java.util.List;

public class Stage {

  private List<EnemyFlight> enemies = new ArrayList<>();
  private List<Obstacle> obstacles = new ArrayList<>();
  private Boss boss;

  private EnemyFactory enemyFactory;

  public Stage(int level) {
    this.enemyFactory = EnemyFactory.getFactory(level);
  }

  public void run() {
    createEnemies();
    createObstacles();

    enemies.forEach(e -> e.attack());
    obstacles.forEach(b -> b.block());
    boss.specialAttack();
  }

  private void createEnemies() {
    for (int i = 0; i < 10; i++) {
      enemies.add(enemyFactory.createSmallFlight());
    }
    boss = enemyFactory.createBoss();
  }

  private void createObstacles() {
    for (int i = 0; i < 10; i++) {
      obstacles.add(enemyFactory.createObstacle());
    }
  }
}
