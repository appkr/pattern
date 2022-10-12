package dev.appkr.pattern.dsl;

import dev.appkr.pattern.dsl.Trade.Type;
import java.util.function.Consumer;

public class LambdaOrderBuilder {

  private Order order = new Order();

  public static Order order(Consumer<LambdaOrderBuilder> consumer) {
    final LambdaOrderBuilder builder = new LambdaOrderBuilder();
    consumer.accept(builder);
    return builder.order;
  }

  public void forCustomer(String customer) {
    order.setCustomer(customer);
  }

  public void buy(Consumer<TradeBuilder> consumer) {
    trade(consumer, Type.BUY);
  }

  public void sell(Consumer<TradeBuilder> consumer) {
    trade(consumer, Type.SELL);
  }

  private void trade(Consumer<TradeBuilder> consumer, Type type) {
    final TradeBuilder builder = new TradeBuilder();
    builder.type(type);
    consumer.accept(builder);
    order.addTrade(builder.build());
  }
}
