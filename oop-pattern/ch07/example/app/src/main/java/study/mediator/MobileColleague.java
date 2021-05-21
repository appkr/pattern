package study.mediator;

public class MobileColleague extends Colleague {

  public MobileColleague(Mediator mediator) {
    super(mediator);
  }

  @Override
  public void receive(String message) {
    System.out.println("Received by MobileColleague: " + message);
  }
}
