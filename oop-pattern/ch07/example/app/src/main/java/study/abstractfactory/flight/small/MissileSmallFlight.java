package study.abstractfactory.flight.small;

public class MissileSmallFlight extends SmallFlight {

  public MissileSmallFlight(int attackPower, int defensePower) {
    super(attackPower, defensePower);
  }

  @Override
  public void attack() {
    System.out.println("미사일 공격: " + attackPower);
  }
}
