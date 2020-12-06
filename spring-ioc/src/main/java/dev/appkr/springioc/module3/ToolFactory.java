package dev.appkr.springioc.module3;

import lombok.Getter;
import lombok.Setter;
import org.springframework.beans.factory.FactoryBean;

@Getter
@Setter
public class ToolFactory implements FactoryBean<Tool> {

  private int factoryId;
  private int toolId;

  @Override
  public Tool getObject() throws Exception {
    return new Tool(toolId);
  }

  @Override
  public Class<?> getObjectType() {
    return Tool.class;
  }

  @Override
  public boolean isSingleton() {
    return false;
  }
}
