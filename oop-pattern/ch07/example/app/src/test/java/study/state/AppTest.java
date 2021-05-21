package study.state;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertThrows;

public class AppTest {

  private VendingMachine vm;

  @BeforeEach
  public void setup() {
    this.vm = new VendingMachine(2);
  }

  @Test
  public void testNoCoinState() {
    IllegalStateException e = assertThrows(IllegalStateException.class, () -> {
      vm.select(Coffee.NORMAL);
    });

    System.out.println("에러 메시지 = " + e.getMessage());
  }

  @Test
  public void testSelectableState() {
    vm.insertCoin(200);
    Coffee coffee = vm.select(Coffee.NORMAL);

    System.out.println("뽑은 커피 = " + coffee.name());
    System.out.println("자판기 상태 = " + vm);
  }

  @Test
  public void testOutOfStockState() {
    vm.insertCoin(200);
    Coffee coffee1 = vm.select(Coffee.NORMAL);
    Coffee coffee2 = vm.select(Coffee.NORMAL);

    System.out.println("자판기 상태 = " + vm);
  }

  @Test
  public void testInsufficientCoin() {
    IllegalStateException e = assertThrows(IllegalStateException.class, () -> {
      vm.insertCoin(100);
      vm.select(Coffee.PREMIUM);
    });

    System.out.println("에러 메시지 = " + e.getMessage());
  }

}
