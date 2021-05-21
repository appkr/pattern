package study.paperboy;

public class App {

  public static void main(String[] args) {
    int subscriptionPrice = 10000;
    Paperboy paperboy = new Paperboy();
    Customer john = new Customer("John", new Wallet(11000));
    Customer jane = new Customer("Jane", new Wallet(3000));

    try {
      paperboy.collectPaperSubscriptionFrom(john, subscriptionPrice);
      message(john, subscriptionPrice);

      paperboy.collectPaperSubscriptionFrom(jane, subscriptionPrice);
      message(jane, subscriptionPrice);
    } catch (Exception e) {
      System.out.println(e.getMessage());
    }
  }

  static void message(Customer customer, int subscriptionPrice) {
    System.out.println(String.format("%s님의 신문 구독 대금 %d를 수금했습니다", customer.getName(), subscriptionPrice));
  }
}
