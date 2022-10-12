package dev.appkr.pattern.dsl;

import dev.appkr.pattern.dsl.Trade.Type;
import java.util.function.Consumer;

public class TradeBuilder {

  private Trade trade = new Trade();

  public Trade build() {
    return trade;
  }

  public void type(Type type) {
    trade.setType(type);
  }

  public void quantity(int quantity) {
    trade.setQuantity(quantity);
  }

  public void price(double price) {
    trade.setPrice(price);
  }

  public void stock(Consumer<StockBuilder> consumer) {
    final StockBuilder builder = new StockBuilder();
    consumer.accept(builder);
    trade.setStock(builder.build());
  }
}
