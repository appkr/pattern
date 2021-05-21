package study.abstractfactory.flight.boss;

public class StrongAttackBoss extends Boss {

  public StrongAttackBoss(int attackPower, int defensePower) {
    super(attackPower, defensePower);
  }

  @Override
  public void specialAttack() {
    System.out.println("특별 공격: " + attackPower * 3);
  }

  @Override
  public void attack() {
    System.out.println("공격" + attackPower);
  }
}
