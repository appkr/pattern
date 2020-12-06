package dev.appkr.pattern.objectpool;

import org.apache.commons.pool2.BasePooledObjectFactory;
import org.apache.commons.pool2.PooledObject;
import org.apache.commons.pool2.PooledObjectFactory;
import org.apache.commons.pool2.impl.DefaultPooledObject;
import org.apache.commons.pool2.impl.GenericObjectPool;
import org.apache.commons.pool2.impl.GenericObjectPoolConfig;
import org.junit.jupiter.api.Test;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import java.util.Random;
import java.util.stream.IntStream;

public class ApacheObjectPoolTest {

  private final Logger log = LoggerFactory.getLogger(getClass());

  @Test
  public void testApacheObjectPool() throws Exception {

    PooledObjectFactory<ExpensiveObject> factory = new BasePooledObjectFactory<>() {
      @Override
      public ExpensiveObject create() throws Exception {
        final int cost = new Random().nextInt(10);
        return new ExpensiveObject(cost);
      }

      @Override
      public PooledObject<ExpensiveObject> wrap(ExpensiveObject obj) {
        return new DefaultPooledObject<>(obj);
      }
    };

    GenericObjectPoolConfig<ExpensiveObject> config = new GenericObjectPoolConfig<>();
    config.setMaxIdle(10);
    config.setMaxTotal(10);
    config.setMinIdle(1);

    GenericObjectPool<ExpensiveObject> pool = new GenericObjectPool<>(factory, config);

    for (int i = 0; i < 20; i++) {
      // This makes just 10 objects, even thought we gave 20
      pool.addObject();
    }

    log.info("numActive {} numIdle {}", pool.getNumActive(), pool.getNumIdle());

    final ExpensiveObject o1 = pool.borrowObject();
    final ExpensiveObject o2 = pool.borrowObject(2000);
    log.info("numActive {} numIdle {} o1 {} o2 {}", pool.getNumActive(), pool.getNumIdle(), o1, o2);

    pool.returnObject(o1);
    log.info("numActive {} numIdle {}", pool.getNumActive(), pool.getNumIdle());

    Thread.sleep(3000);
    final ExpensiveObject o3 = pool.borrowObject();
    log.info("numActive {} numIdle {}", pool.getNumActive(), pool.getNumIdle());
  }
}
