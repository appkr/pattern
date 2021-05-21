package study.adapter;

public class EnemyRobotAdapter implements EnemyAttacker {

  EnemyRobot theRobot;

  public EnemyRobotAdapter(EnemyRobot newRobot) {
    this.theRobot = newRobot;
  }

  @Override
  public void fireWeapon() {
    theRobot.smashWithHand();
  }

  @Override
  public void driveForward() {
    theRobot.walkForward();
  }

  @Override
  public void assignDriver(String driverName) {
    theRobot.reactToHuman(driverName);
  }
}
