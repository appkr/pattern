package dev.appkr.pattern.dsl;

public class TradeBuilderAlt {

  Trade trade = new Trade();

  public TradeBuilderAlt quantity(int quantity) {
    trade.setQuantity(quantity);
    return this;
  }

  public TradeBuilderAlt at(double price) {
    trade.setPrice(price);
    return this;
  }

  public StockBuilderAlt stock(String symbol) {
    return new StockBuilderAlt(this, trade, symbol);
  }

  public Trade build() {
    return trade;
  }
}
