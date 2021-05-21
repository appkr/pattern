package study.adapter;

public class App {

  public static void main(String[] args) {
    EnemyAttacker rx7Tank = new EnemyTank();
    rx7Tank.assignDriver("Tom");
    rx7Tank.fireWeapon();
    rx7Tank.driveForward();

    EnemyRobot fredTheRobot = new EnemyRobot();
    EnemyAttacker threePo = new EnemyRobotAdapter(fredTheRobot);
    threePo.assignDriver("Luke");
    threePo.fireWeapon();
    threePo.driveForward();
  }
}
