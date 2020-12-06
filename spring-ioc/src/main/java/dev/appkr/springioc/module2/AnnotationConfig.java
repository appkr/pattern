package dev.appkr.springioc.module2;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.Scope;

@Configuration
public class AnnotationConfig {

  @Bean(name = {"tiger", "kitty"})
  @Scope(value = "prototype")
  public Tiger getTiger(String name) {
    return new Tiger(name);
  }

  @Bean(name = "lion")
  public Lion getLion() {
    return new Lion ("Hardcoded lion name");
  }
}
