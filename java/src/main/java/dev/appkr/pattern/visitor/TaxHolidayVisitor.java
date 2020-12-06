package dev.appkr.pattern.visitor;

import java.text.DecimalFormat;

public class TaxHolidayVisitor implements Visitor {

  DecimalFormat df =  new DecimalFormat("#.##");

  @Override
  public double visit(Liquor visitable) {
    double price = visitable.getPrice() + visitable.getPrice() * 0.10;
    return Double.parseDouble(df.format(price));
  }

  @Override
  public double visit(Tobacco visitable) {
    double price = visitable.getPrice() + visitable.getPrice() * 0.30;
    return Double.parseDouble(df.format(price));
  }

  @Override
  public double visit(Necessity visitable) {
    double price = visitable.getPrice() + visitable.getPrice() * 0;
    return Double.parseDouble(df.format(price));
  }
}
