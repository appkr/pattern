package javastudy.coupon;

public class Coupon {

  private int discountAmount;

  public Coupon(int discountAmount) {
    this.discountAmount = discountAmount;
  }

  public int getDiscountAmount() {
    return discountAmount;
  }

  public int calculateDiscountedPrice(int price) {
    if (price < discountAmount) {
      return 0;
    }
    return price - discountAmount;
  }
}
