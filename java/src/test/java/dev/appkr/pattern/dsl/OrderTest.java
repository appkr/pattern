package dev.appkr.pattern.dsl;

import dev.appkr.pattern.dsl.Trade.Type;
import org.junit.jupiter.api.Test;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class OrderTest {

  static final Logger log = LoggerFactory.getLogger(OrderTest.class);

  @Test
  void testTraditional() {
    final Order order = new Order();
    order.setCustomer("BigBank");

    final Trade trade1 = new Trade();
    trade1.setType(Type.BUY);

    final Stock stock1 = new Stock();
    stock1.setSymbol("IBM");
    stock1.setMarket("NYSE");

    trade1.setStock(stock1);
    trade1.setPrice(125.00);
    trade1.setQuantity(80);
    order.addTrade(trade1);

    final Trade trade2 = new Trade();
    trade2.setType(Type.SELL);

    final Stock stock2 = new Stock();
    stock2.setSymbol("GOOGLE");
    stock2.setMarket("NASDAQ");

    trade2.setStock(stock2);
    trade2.setPrice(375.00);
    trade2.setQuantity(50);
    order.addTrade(trade2);

    log.info("{}", order);
  }

  @Test
  void testDsl1() {
    final Order order = LambdaOrderBuilder
        .order(o -> {
          o.forCustomer("BigBank"); // void
          o.buy(t -> {
            t.quantity(80);
            t.price(125.00);
            t.stock(s -> {
              s.symbol("IBM");
              s.market("NYSE");
            });
          });                       // void
          o.sell(t -> {
            t.quantity(50);
            t.price(375.00);
            t.stock(s -> {
              s.symbol("GOOGLE");
              s.market("NASDAQ");
            });                     // void
          });
        });

    log.info("{}", order);
  }

  @Test
  void testDsl2() {
    final TradeBuilderAlt buyTrade = MixedOrderBuilder
        .buy(t -> t.quantity(80)  // TradeBuilder
            .stock("IBM")  // StockBuilder
            .on("NYSE")    // TradeBuilder
            .at(125.00));         // TradeBuilder

    final TradeBuilderAlt sellTrade = MixedOrderBuilder
        .sell(t -> t.quantity(50)
            .stock("GOOGLE")
            .on("NASDAQ")
            .at(125.00));

    final Order order = MixedOrderBuilder
        .forCustomer("BigBank", buyTrade, sellTrade);

    log.info("{}", order);
  }
}
