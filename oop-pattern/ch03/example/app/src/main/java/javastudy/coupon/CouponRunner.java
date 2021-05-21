package javastudy.coupon;

public class CouponRunner {

  public static void main(String[] args) {
    final Coupon coupon = new Coupon(3000);
    final int price = coupon.calculateDiscountedPrice(5000);
    System.out.println("Discounted price: " + price);

    final LimitedPriceCoupon lpCoupon = new LimitedPriceCoupon(5000, 1000);
    System.out.println("When price is 10,000: " + lpCoupon.calculateDiscountedPrice(10000));
    System.out.println("When price is 500: " + lpCoupon.calculateDiscountedPrice(500));
  }
}
