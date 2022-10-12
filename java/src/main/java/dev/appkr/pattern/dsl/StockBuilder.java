package dev.appkr.pattern.dsl;

public class StockBuilder {

  private Stock stock = new Stock();

  public Stock build() {
    return stock;
  }

  public void symbol(String symbol) {
    stock.setSymbol(symbol);
  }

  public void market(String market) {
    stock.setMarket(market);
  }
}
