package study.abstractfactory.flight;

public abstract class EnemyFlight {

  protected int attackPower;
  protected int defensePower;

  public EnemyFlight(int attackPower, int defensePower) {
    this.attackPower = attackPower;
    this.defensePower = defensePower;
  }

  public abstract void attack();

  public int getAttackPower() {
    return attackPower;
  }

  public void setAttackPower(int attackPower) {
    this.attackPower = attackPower;
  }

  public int getDefensePower() {
    return defensePower;
  }

  public void setDefensePower(int defensePower) {
    this.defensePower = defensePower;
  }
}
