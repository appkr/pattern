package study.mediator;

public class DesktopColleague extends Colleague {

  public DesktopColleague(Mediator mediator) {
    super(mediator);
  }

  @Override
  public void receive(String message) {
    System.out.println("Received by DesktopColleague: " + message);
  }
}
