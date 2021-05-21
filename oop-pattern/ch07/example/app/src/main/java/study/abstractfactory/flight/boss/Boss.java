package study.abstractfactory.flight.boss;

import study.abstractfactory.flight.EnemyFlight;

public abstract class Boss extends EnemyFlight {

  public Boss(int attackPower, int defensePower) {
    super(attackPower, defensePower);
  }

  public abstract void specialAttack();
}
