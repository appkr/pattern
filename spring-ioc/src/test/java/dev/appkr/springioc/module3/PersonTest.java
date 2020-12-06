package dev.appkr.springioc.module3;

import dev.appkr.springioc.SpringIocApplication;
import lombok.extern.slf4j.Slf4j;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit.jupiter.SpringExtension;

import static org.junit.jupiter.api.Assertions.*;

@ExtendWith(SpringExtension.class)
@SpringBootTest(classes = {SpringIocApplication.class})
@Slf4j
class PersonTest {

  @Autowired
  private Person aPerson;

  @Test
  void testPerson() {
    log.info("Person object {}", aPerson);
    assertEquals(Person.class, aPerson.getClass());
  }
}