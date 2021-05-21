package study.abstractfactory.flight.small;

public class DashSmallFlight extends SmallFlight {

  public DashSmallFlight(int attackPower, int defensePower) {
    super(attackPower, defensePower);
  }

  @Override
  public void attack() {
    System.out.println("자폭 공격: " + attackPower);
  }
}
