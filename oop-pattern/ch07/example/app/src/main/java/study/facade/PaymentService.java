package study.facade;

public class PaymentService {

  static boolean makePayment(int price) {
    // 외부 지불 서비스와 연결하여 지불 처리
    System.out.println("제품 대금 " + price + "원에 대한 결재 처리가 완료됐습니다");
    return true;
  }
}
