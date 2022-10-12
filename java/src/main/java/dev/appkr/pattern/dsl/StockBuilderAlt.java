package dev.appkr.pattern.dsl;

import dev.appkr.pattern.dsl.Trade.Type;

public class StockBuilderAlt {

  final TradeBuilderAlt builder;
  final Trade trade;
  final Stock stock = new Stock();

  public StockBuilderAlt(TradeBuilderAlt builder, Trade trade, String symbol) {
    this.builder = builder;
    this.trade = trade;
    stock.setSymbol(symbol);
  }

  public TradeBuilderAlt on(String market) {
    stock.setMarket(market);
    trade.setStock(stock);
    return builder;
  }
}
