package dev.appkr.pattern.dsl;

import dev.appkr.pattern.dsl.Trade.Type;
import java.util.function.Consumer;
import java.util.stream.Stream;

public class MixedOrderBuilder {

  public static Order forCustomer(String customer, TradeBuilderAlt... builders) {
    final Order order = new Order();
    order.setCustomer(customer);
    Stream.of(builders)
        .forEach(b -> order.addTrade(b.build()));
    return order;
  }

  public static TradeBuilderAlt buy(Consumer<TradeBuilderAlt> consumer) {
    return buildTrade(consumer, Type.BUY);
  }

  public static TradeBuilderAlt sell(Consumer<TradeBuilderAlt> consumer) {
    return buildTrade(consumer, Type.BUY);
  }

  private static TradeBuilderAlt buildTrade(Consumer<TradeBuilderAlt> consumer, Type type) {
    final TradeBuilderAlt builder = new TradeBuilderAlt();
    builder.trade.setType(type);
    consumer.accept(builder);
    return builder;
  }
}
