package study.paperboy;

public class Customer {

  String name;
  Wallet wallet;

  public Customer(String name, Wallet wallet) {
    this.name = name;
    this.wallet = wallet;
  }

  public Customer() {
  }

  public int getPayment(int subscriptionPrice) {
    if (wallet == null) {
      throw new NotEnoughMoneyException(name + "님은 지금 지갑이 없습니다");
    }
    if (wallet.getTotalMoney() >= subscriptionPrice) {
      wallet.subtractMoney(subscriptionPrice);
      return subscriptionPrice;
    }

    throw new NotEnoughMoneyException(String.format("%s님의 지갑에 돈이 부족합니다: 신문값 %d, 지갑잔액 %d",
        getName(), subscriptionPrice, wallet.getTotalMoney()));
  }

  public String getName() {
    return name;
  }

  public Wallet getWallet() {
    return wallet;
  }

  @Override
  public String toString() {
    return "Customer{" +
        "name='" + name + '\'' +
        ", wallet=" + wallet +
        '}';
  }
}
