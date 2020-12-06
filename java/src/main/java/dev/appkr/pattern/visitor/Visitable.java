package dev.appkr.pattern.visitor;

public interface Visitable {

  double getPrice();
  double accept(Visitor visitor);
}
