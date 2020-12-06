package dev.appkr.pattern.visitor;

public interface Visitor {

  public double visit(Liquor visitable);
  public double visit(Tobacco visitable);
  public double visit(Necessity visitable);
}
