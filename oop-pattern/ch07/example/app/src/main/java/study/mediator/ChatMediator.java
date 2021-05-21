package study.mediator;

import java.util.ArrayList;
import java.util.List;

public class ChatMediator implements Mediator {

  List<Colleague> colleagues = new ArrayList<>();

  void addColleague(Colleague colleague) {
    colleagues.add(colleague);
  }
  @Override
  public void send(String message, Colleague originator) {
    for (Colleague colleague : colleagues) {
      if (colleague != originator) {
        colleague.receive(message);
      }
    }
  }
}
