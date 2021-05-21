package javastudy.coupon;

public class LimitedPriceCoupon extends Coupon {

  private int limitPrice;

  public LimitedPriceCoupon(int discountAmount, int limitPrice) {
    super(discountAmount);
    this.limitPrice = limitPrice;
  }

  public int getLimitPrice() {
    return limitPrice;
  }

  @Override
  public int calculateDiscountedPrice(int price) {
    if (price < limitPrice) { // 제품 가격이 제한 금액보다 작으면...
      return price;
    }
    return super.calculateDiscountedPrice(price);
  }
}
