package study.abstractfactory.flight.small;

import study.abstractfactory.flight.EnemyFlight;

public abstract class SmallFlight extends EnemyFlight {

  public SmallFlight(int attackPower, int defensePower) {
    super(attackPower, defensePower);
  }
}
