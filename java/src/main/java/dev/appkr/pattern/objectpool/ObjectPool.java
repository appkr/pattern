package dev.appkr.pattern.objectpool;

import java.util.Enumeration;
import java.util.Hashtable;

public abstract class ObjectPool<T> {

  private long expirationTime = 5000; // 5 sec
  private Hashtable<T, Long> occupied  = new Hashtable<T, Long>(); // list of objects currently being used
  private Hashtable<T, Long> available = new Hashtable<T, Long>(); // list of objects currently available

  abstract T create();

  abstract boolean validate(T o);

  abstract void destroy(T o) throws Exception;

  public synchronized T get() {
    long now = System.currentTimeMillis();
    T t;
    try {
      if (available.size() > 0) {
        Enumeration<T> e = available.keys();
        while (e.hasMoreElements()) {
          t = e.nextElement();
          long elementLife = now - available.get(t);
          if (elementLife > expirationTime) {
            // object has expired
            available.remove(t);
            destroy(t);
            t = null;
          } else {
            if (validate(t)) {
              available.remove(t);
              occupied.put(t, now);
              return t;
            } else {
              // object failed validation
              available.remove(t);
              destroy(t);
              t = null;
            }
          }
        }
      }
    } catch (Exception e) {
      return null;
    }

    // no objects available, create a new one
    t = create();
    occupied.put(t, now);

    return (t);
  }

  public synchronized void release(T t) {
    occupied.remove(t);
    available.put(t, System.currentTimeMillis());
  }

  // The following getters are just for TEST

  public Hashtable<T, Long> getOccupied() {
    return this.occupied;
  }

  public Hashtable<T, Long> getAvailable() {
    return available;
  }
}
