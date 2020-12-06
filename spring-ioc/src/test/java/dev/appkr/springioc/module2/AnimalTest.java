package dev.appkr.springioc.module2;

import dev.appkr.springioc.SpringIocApplication;
import lombok.extern.slf4j.Slf4j;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.springframework.beans.factory.BeanFactory;
import org.springframework.beans.factory.BeanNotOfRequiredTypeException;
import org.springframework.beans.factory.NoUniqueBeanDefinitionException;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit.jupiter.SpringExtension;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;

@ExtendWith(SpringExtension.class)
@SpringBootTest(classes = {SpringIocApplication.class})
@Slf4j
class AnimalTest {

  @Autowired
  private BeanFactory ctx;

  @Test
  void testRetrievingBeanByName() {
     final Object lion = ctx.getBean("lion");

     log.info("The getBean() APIs - Retrieving Bean by Name {}", lion);
     assertEquals(Lion.class, lion.getClass());
  }

  @Test
  void testClassCastException() {
    assertThrows(ClassCastException.class, () -> {
      final Tiger tiger = (Tiger) ctx.getBean("lion");
    });
  }

  @Test
  void testRetrievingBeanByNameAndType() {
    final Lion lion = ctx.getBean("lion", Lion.class);

    log.info("The getBean() APIs - Retrieving Bean by Name and Type {}", lion);
    assertEquals(Lion.class, lion.getClass());
  }

  @Test
  public void testBeanNotOfRequiredTypeException() {
    assertThrows(BeanNotOfRequiredTypeException.class, () -> {
      final Tiger lion = ctx.getBean("lion", Tiger.class);
    });
  }

  @Test
  public void testRetrievingBeanByType() {
    final Lion lion = ctx.getBean(Lion.class);

    log.info("The getBean() APIs - Retrieving Bean by Type {}", lion);
    assertEquals(Lion.class, lion.getClass());
  }

  @Test
  public void testNoUniqueBeanDefinitionException() {
    assertThrows(NoUniqueBeanDefinitionException.class, () -> {
      ctx.getBean(Animal.class);
    });
  }

  @Test
  public void testRetrievingBeanByNameWithConstructorParameters() {
    // Because a prototype bean will return a newly created instance every time it's requested from the application
    // container, we can provide constructor parameters on-the-fly when invoking getBean():
    final Tiger tiger = (Tiger) ctx.getBean("tiger", "Siberian");
    final Tiger tiger2 = (Tiger) ctx.getBean("tiger", "Striped");

    log.info("The getBean() APIs - Retrieving Bean by Name with Constructor Parameters {}", tiger);
    assertEquals(Tiger.class, tiger.getClass());
    assertEquals("Striped", tiger2.getName());
  }

  @Test
  public void testRetrieveBeanByTypeWithConstructorParameters() {
    final Tiger tiger = ctx.getBean(Tiger.class, "Shere Khan");

    log.info("The getBean() APIs - Retrieving Bean by Type With Constructor Parameters {}", tiger);
    assertEquals("Shere Khan", tiger.getName());
  }
}