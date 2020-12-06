package dev.appkr.pattern.objectpool;

import java.util.Random;

public class ExpensiveObjectPool extends ObjectPool<ExpensiveObject> {

  @Override
  public ExpensiveObject create() {
    final int cost = new Random().nextInt(10);
    return new ExpensiveObject(cost);
  }

  @Override
  public boolean validate(ExpensiveObject o) {
    return o.getCost() > 0;
  }

  @Override
  public void destroy(ExpensiveObject o) throws Exception {
    o.close();
  }
}
