package dev.appkr.pattern.objectpool;

public class ExpensiveObject implements AutoCloseable {

  private int cost;

  public ExpensiveObject(int cost) {
    this.cost = cost;
  }

  int getCost() {
    return cost;
  }

  @Override
  public void close() throws Exception {
    this.cost = -1;
  }

  @Override
  public String toString() {
    return "ExpensiveObject{" +
        "cost=" + cost +
        '}';
  }
}
