package study.state;

public class SelectableState implements State {

  @Override
  public void increaseCoin(int coin, VendingMachine ctx) {
    ctx.acceptCoin(coin);
  }

  @Override
  public Coffee select(Coffee coffee, VendingMachine ctx) {
    if (!ctx.isEnoughCoinProvidedFor(coffee)) {
      throw new IllegalStateException("동전을 더 넣어 주세요");
    }

    ctx.consumeCoin(coffee.getPrice());

    if (ctx.hasNoCoin()) {
      ctx.changeState(new NoCoinState());
    }

    // SoldOutState이면 NoCoinState를 Override
    return ctx.serve(coffee);
  }

  @Override
  public String toString() {
    return "SelectableState{}";
  }
}
