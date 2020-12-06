package dev.appkr.pattern.objectpool;

import org.junit.jupiter.api.Test;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class ExpensiveObjectPoolTest {

  private final Logger log = LoggerFactory.getLogger(getClass());

  @Test
  public void testExpensiveObjectPool() throws InterruptedException {
    ObjectPool<ExpensiveObject> pool = new ExpensiveObjectPool();
    ExpensiveObject o1 = pool.get();
    ExpensiveObject o2 = pool.get();

    log.info("available {}", pool.getAvailable().size());
    log.info("occupied  {}", pool.getOccupied().size());

    pool.release(o1);
    ExpensiveObject o3 = pool.get();


    log.info("available {}", pool.getAvailable().size());
    log.info("occupied  {}", pool.getOccupied().size());

    Thread.sleep(6000);

    ExpensiveObject o4 = pool.get();

    log.info("available {}", pool.getAvailable().size());
    log.info("occupied  {}", pool.getOccupied().size());
  }
}
