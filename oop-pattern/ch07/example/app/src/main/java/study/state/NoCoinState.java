package study.state;

public class NoCoinState implements State {

  @Override
  public void increaseCoin(int coin, VendingMachine ctx) {
    ctx.acceptCoin(coin);
    ctx.changeState(new SelectableState());
  }

  @Override
  public Coffee select(Coffee coffee, VendingMachine ctx) {
    throw new IllegalStateException("동전을 넣어 주세요");
  }

  @Override
  public String toString() {
    return "NoCoinState{}";
  }
}
