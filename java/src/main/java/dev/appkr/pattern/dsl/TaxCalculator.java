package dev.appkr.pattern.dsl;

import java.util.function.DoubleUnaryOperator;

public class TaxCalculator {

  public DoubleUnaryOperator taxFunction = d -> d;

  public TaxCalculator with(DoubleUnaryOperator f) {
    this.taxFunction = taxFunction.andThen(f);
    return this;
  }

  public double calculate(Order order) {
    return taxFunction.applyAsDouble(order.getValue());
  }
}
