package study.mediator;

public class App {

  public static void main(String[] args) {
    ChatMediator mediator = new ChatMediator();

    Colleague desktop = new DesktopColleague(mediator);
    Colleague mobile = new MobileColleague(mediator);
    Colleague tablet = new TabletColleague(mediator);

    mediator.addColleague(desktop);
    mediator.addColleague(mobile);
    mediator.addColleague(tablet);

    desktop.send("Hello world!");
    mobile.send("Hi everyone?");
  }
}
