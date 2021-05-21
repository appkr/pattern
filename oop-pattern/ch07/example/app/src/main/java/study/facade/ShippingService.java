package study.facade;

public class ShippingService {

  static void shipProduct(Product product) {
    // 외부 배송 서비스와 연결하여 배송 신청
    System.out.println(product.getProductId() + "번 제품을 배송 신청했습니다");
  }
}
