package study.state;

public enum Coffee {
  NORMAL(100),
  PREMIUM(200);

  int price;

  Coffee(int price) {
    this.price = price;
  }

  public int getPrice() {
    return price;
  }
}
