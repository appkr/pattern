package dev.appkr.springioc.module3;

import dev.appkr.springioc.SpringIocApplication;
import lombok.extern.slf4j.Slf4j;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit.jupiter.SpringExtension;

import static org.junit.jupiter.api.Assertions.*;

@ExtendWith(SpringExtension.class)
@SpringBootTest(classes = {SpringIocApplication.class})
@Slf4j
class EmployeeTest {

  @Autowired @Qualifier("manager") Employee aManager;
  @Autowired @Qualifier("manager") Employee anotherManager;
  @Autowired @Qualifier("director") Employee director;

  @Test
  void testManager() {
    log.info("Manager object {}", aManager);
    assertEquals(Employee.class, aManager.getClass());
    assertEquals("Manager", aManager.getDesignation());
  }

  @Test
  void testDirector() {
    log.info("Director object {}", director);
    assertEquals(Employee.class, director.getClass());
    assertEquals("Director", director.getDesignation());
  }

  @Test
  void testSingleton() {
    log.info("Singleton objects {} {}", aManager.hashCode(), anotherManager.hashCode());
    assertTrue(aManager == anotherManager);
  }
}