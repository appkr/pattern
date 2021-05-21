package study.container;

import java.util.ArrayList;

public class Container extends ArrayList {

  private int maxSize;
  private int currentSize;

  public Container(int maxSize) {
    this.maxSize = maxSize;
  }

  public void put(Luggage lug) throws NotEnoughSpaceException {
    if (!canContain(lug)) {
      throw new NotEnoughSpaceException();
    }
    super.add(lug);
    currentSize += lug.size();
  }

  public void extract(Luggage lug) {
    super.remove(lug);
    currentSize -= lug.size();
  }

  public boolean canContain(Luggage lug) {
    return maxSize >= currentSize + lug.size();
  }

  public int getMaxSize() {
    return maxSize;
  }

  public int getCurrentSize() {
    return currentSize;
  }
}
