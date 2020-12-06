package dev.appkr.springioc.module3;

import dev.appkr.springioc.SpringIocApplication;
import lombok.extern.slf4j.Slf4j;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.extension.ExtendWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit.jupiter.SpringExtension;

import javax.annotation.Resource;

import static org.junit.jupiter.api.Assertions.*;

@ExtendWith(SpringExtension.class)
@SpringBootTest(classes = {SpringIocApplication.class})
@Slf4j
class ToolTest {

  @Autowired
  private Tool tool;

  @Resource(name = "&tool")
  private ToolFactory toolFactory;

  @Test
  public void testConstructWorkerByJava() {
    log.info("Tool object {}", tool);
    assertEquals(2, tool.getId());
  }
}