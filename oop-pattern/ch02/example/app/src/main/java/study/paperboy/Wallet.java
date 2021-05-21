package study.paperboy;

public class Wallet {

  int money;

  public Wallet(int money) {
    this.money = money;
  }

  public Wallet() {
  }

  public int getTotalMoney() {
    return money;
  }

  public void subtractMoney(int debit) {
    money -= debit;
  }

  @Override
  public String toString() {
    return "Wallet{" +
        "money=" + money +
        '}';
  }
}
