package dev.appkr.springioc.module3;

import lombok.Getter;
import lombok.Setter;
import org.springframework.beans.factory.config.AbstractFactoryBean;
import org.springframework.util.Assert;

import javax.annotation.PostConstruct;

@Getter
@Setter
public class EmployeeFactory extends AbstractFactoryBean<Employee> {

  private String designation;

  public EmployeeFactory() {
    setSingleton(true);
  }

  @PostConstruct
  public void setup() {
    Assert.notNull(designation, "the 'designation' value must not be null")	;
  }

  @Override
  public Class<Employee> getObjectType() {
    return Employee.class;
  }

  @Override
  protected Employee createInstance() throws Exception {
    Employee employee = new Employee();
    employee.setId(-1);
    employee.setFirstName("dummy");
    employee.setLastName("dummy");
    employee.setDesignation(designation);

    return employee;
  }
}
