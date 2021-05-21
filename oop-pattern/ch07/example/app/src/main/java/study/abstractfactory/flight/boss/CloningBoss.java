package study.abstractfactory.flight.boss;

public class CloningBoss extends Boss {

  public CloningBoss(int attackPower, int defensePower) {
    super(attackPower, defensePower);
  }

  @Override
  public void specialAttack() {
    System.out.println("분신술 공격: " + attackPower * 5);
  }

  @Override
  public void attack() {
    System.out.println("공격: " + attackPower);
  }
}
