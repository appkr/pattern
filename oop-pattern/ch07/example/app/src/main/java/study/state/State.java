package study.state;

public interface State {

  void increaseCoin(int coin, VendingMachine ctx);
  Coffee select(Coffee coffee, VendingMachine ctx);
}
