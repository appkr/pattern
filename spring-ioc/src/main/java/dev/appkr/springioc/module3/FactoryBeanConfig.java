package dev.appkr.springioc.module3;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

@Configuration
public class FactoryBeanConfig {

  @Bean(name = "tool")
  public ToolFactory toolFactory() {
    ToolFactory factory = new ToolFactory();
    factory.setFactoryId(7070);
    factory.setToolId(2);

    return factory;
  }

  @Bean
  public Tool tool() throws Exception {
    return toolFactory().getObject();
  }

  @Bean
  public CarFactory carFactory() {
    CarFactory factory = new CarFactory();
    factory.setMake("Ford");
    factory.setYear(1984);

    return factory;
  }

  @Bean
  public Person person() throws Exception {
    Person person = new Person();
    person.setCar(carFactory().getObject());

    return person;
  }

  @Bean(name = "manager")
  public EmployeeFactory managerFactory() {
    EmployeeFactory factory = new EmployeeFactory();
    factory.setDesignation("Manager");

    return factory;
  }

  @Bean(name = "director")
  public EmployeeFactory directorFactory() {
    EmployeeFactory factory = new EmployeeFactory();
    factory.setDesignation("Director");

    return factory;
  }
}
