package study.strategy;

public class FirstGuestDiscountStragety implements DiscountStrategy {

  @Override
  public int getDiscountPrice(Item item) {
    return (int)(item.getPrice() * 0.9);
  }
}
