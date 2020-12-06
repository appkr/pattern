package dev.appkr.springioc.module1;

import dev.appkr.springioc.SpringIocApplication;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.context.ApplicationContext;
import org.springframework.test.context.junit.jupiter.SpringExtension;

import static org.junit.jupiter.api.Assertions.assertTrue;

@ExtendWith(SpringExtension.class)
@SpringBootTest(classes = {SpringIocApplication.class})
class CompanyTest {

  private final Logger log = LoggerFactory.getLogger(getClass());
  @Autowired private ApplicationContext ctx;

  @Test
  public void testInstantiateCompany() {
    final Company company = new Company(new Address("High Street", 1000));

    log.info("Instance created manually {}", company);
    assertTrue(company != null);
  }

  @Test
  public void testWithSpringIoc() {
    final Company company = ctx.getBean("company", Company.class);

    log.info("Instance created by IoC {}", company);
    assertTrue(company != null);
  }
}