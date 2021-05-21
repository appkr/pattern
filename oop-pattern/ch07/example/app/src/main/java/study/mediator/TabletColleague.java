package study.mediator;

public class TabletColleague extends Colleague {

  public TabletColleague(Mediator mediator) {
    super(mediator);
  }

  @Override
  public void receive(String message) {
    System.out.println("Received by TabletColleague: " + message);
  }
}
