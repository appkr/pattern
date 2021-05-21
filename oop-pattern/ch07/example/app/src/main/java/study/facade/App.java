package study.facade;

public class App {

  public static void main(String[] args) {
    OrderServiceFacade facade = new OrderServiceFacadeImpl();
    Product product = facade.placeOrder(1);
    System.out.println("주문 처리를 완료했습니다: " + product);
  }
}
