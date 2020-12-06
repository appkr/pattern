package dev.appkr.springioc.module3;

import lombok.Getter;
import lombok.Setter;
import org.springframework.beans.factory.FactoryBean;
import org.springframework.util.Assert;
import org.springframework.util.StringUtils;

import javax.annotation.PostConstruct;

@Getter
@Setter
public class CarFactory implements FactoryBean<Car> {

  private String make;
  private int year;

  @PostConstruct
  public void setup() throws Throwable {
    // these methods throw an exception that
    // will arrest construction if the assertions aren't met
    Assert.notNull(this.make, "the 'make' must not be null")	;
    Assert.isTrue(this.year > 0, "the 'year' must be a valid value");
  }

  @Override
  public Car getObject() throws Exception {
    Car car = new Car();

    if (year != 0) {
      car.setYear(year);
    }

    if (StringUtils.hasText(make)) {
      car.setMake(make);
    }

    return car;
  }

  @Override
  public Class<?> getObjectType() {
    return Car.class;
  }

  @Override
  public boolean isSingleton() {
    return false;
  }
}
