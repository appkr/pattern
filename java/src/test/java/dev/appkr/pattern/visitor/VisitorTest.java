package dev.appkr.pattern.visitor;

import org.junit.jupiter.api.Test;

public class VisitorTest {

  @Test
  public void testTaxVisitor() {
    Visitor visitor = new TaxVisitor();

    System.out.println("Liquor price incl. tax = " + (new Liquor(10)).accept(visitor));
    System.out.println("Tobacco price incl. tax = " + (new Tobacco(10)).accept(visitor));
    System.out.println("Necessity price incl. tax = " + (new Necessity(7)).accept(visitor));
  }

  @Test
  public void testTaxHolidayVisitor() {
    Visitor visitor = new TaxHolidayVisitor();

    System.out.println("Liquor price for holiday = " + (new Liquor(10)).accept(visitor));
    System.out.println("Tobacco price for holiday = " + (new Tobacco(10)).accept(visitor));
    System.out.println("Necessity price for holiday = " + (new Necessity(7)).accept(visitor));
  }
}
