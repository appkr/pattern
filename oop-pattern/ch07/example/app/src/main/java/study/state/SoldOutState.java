package study.state;

public class SoldOutState implements State {

  @Override
  public void increaseCoin(int coin, VendingMachine ctx) {
    throw new IllegalStateException("커피 품절");
  }

  @Override
  public Coffee select(Coffee coffee, VendingMachine ctx) {
    throw new IllegalStateException("커피 품절");
  }

  @Override
  public String toString() {
    return "SoldOutState{}";
  }
}
