package study.strategy;

import lombok.extern.slf4j.Slf4j;

import java.util.List;

import static java.util.Arrays.asList;

@Slf4j
public class App {

  public static void main(String[] args) {
    Item apple = new Item(100);
    Item banana = new Item(150);

    App app = new App();
    app.onFirstGuestButtonClick();
    final int price = app.onCalculateButtonClick(asList(apple, banana));

    log.info("Total price = {}", price);
  }

  DiscountStrategy strategy;

  public void onFirstGuestButtonClick() {
    strategy = new FirstGuestDiscountStragety();
  }

  public int onCalculateButtonClick(List<Item> items) {
    return new Calculator(strategy).calculate(items);
  }
}
