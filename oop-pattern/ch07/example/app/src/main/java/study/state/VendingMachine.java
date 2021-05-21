package study.state;

public class VendingMachine {

  State state;
  int balance;      // 고객입 주입한 동전 잔고
  int currentStock; // 자판기의 커피 재고

  public VendingMachine(int initialCoffeeStock) {
    this.currentStock = initialCoffeeStock;
    this.state = new NoCoinState();
  }

  public void insertCoin(int coin) {
    state.increaseCoin(coin, this);
  }

  public Coffee select(Coffee coffee) {
    return state.select(coffee,this);
  }

  public void changeState(State newState) {
    this.state = newState;
  }

  boolean isEnoughCoinProvidedFor(Coffee coffee) {
    return balance >= coffee.getPrice();
  }

  boolean hasNoCoin() {
    return balance == 0;
  }

  void acceptCoin(int newCoin) {
    balance += newCoin;
  }

  void consumeCoin(int amount) {
    balance -= amount;
  }

  public Coffee serve(Coffee coffee) {
    currentStock--;
    if (currentStock == 0) {
      changeState(new SoldOutState());
    }

    return coffee;
  }

  @Override
  public String toString() {
    return "VendingMachine{" +
        "state=" + state +
        ", balance=" + balance +
        ", currentStock=" + currentStock +
        '}';
  }
}
