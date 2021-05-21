package study.paperboy;

public class Paperboy {

  public int collectPaperSubscriptionFrom(Customer customer, int subscriptionPrice) {
    return customer.getPayment(subscriptionPrice);
  }
}
