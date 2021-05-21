package study.container;

public class ContainerRunner {

  public static void main(String[] args) throws NotEnoughSpaceException {
    final Container c = new Container(5);

    final Luggage size3Lug = new Luggage(3);
    if (c.canContain(size3Lug)) {
      c.put(size3Lug);
    }

    final Luggage size2Lug = new Luggage(2);
    if (c.canContain(size2Lug)) {
      c.add(size2Lug);
    }

    final Luggage size1Lug = new Luggage(2);
    if (c.canContain(size1Lug)) {
      c.add(size1Lug);
    }

    System.out.println("Container는 최대 " + c.getMaxSize() + "개의 화물을 실을 수 있습니다. " +
        "현재 " + c.getCurrentSize() + "개의 화물을 적재하고 있습니다");
  }
}
