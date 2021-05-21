package study.facade;

public class InventoryService {

  static boolean isAvailable(Product product) {
    // 창고에 재고가 있는 확인하는 로직
    System.out.println("제품 " + product.getProductId() + "번은 재고가 있습니다");
    return true;
  }
}
