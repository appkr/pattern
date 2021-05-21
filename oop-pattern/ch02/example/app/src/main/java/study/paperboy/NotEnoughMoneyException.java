package study.paperboy;

public class NotEnoughMoneyException extends RuntimeException {

  public NotEnoughMoneyException() {
    super();
  }

  public NotEnoughMoneyException(String message) {
    super(message);
  }
}
