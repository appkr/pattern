## Spring IoC (Spring Bean)

- module 1 @see https://www.baeldung.com/spring-bean
> In Spring, the objects that form the backbone of your application and that are managed by the Spring IoC container are called beans. A bean is an object that is instantiated, assembled, and otherwise managed by a Spring IoC container.

- module 2 @see https://www.baeldung.com/spring-getbean
```java
@Bean(name = {"tiger", "kitty"})
@Scope(value = "prototype")
Tiger getTiger(String name) {
  return new Tiger(name);
}

Tiger tiger = context.getBean(Tiger.class, "Shere Khan");
```

- module 3 @see https://www.baeldung.com/spring-factorybean @see https://spring.io/blog/2011/08/09/what-s-a-factorybean @see https://howtodoinjava.com/spring-core/how-to-create-beans-using-spring-factorybean/
> There are two kinds of beans in the Spring bean container: ordinary beans and factory beans. Spring uses the former directly, whereas latter can produce objects themselves, which are managed by the framework

> By extending the `AbstractFactoryBean` class, your factory bean can simply override the `createInstance()` method to create the target bean instance

- module 4 BeanFactory @see https://www.baeldung.com/spring-beanfactory
> It is important to point that BeanFactory does not support the Annotation-based dependency Injection whereas ApplicationContext, a superset of BeanFactory does

```puml
@startuml
interface BeanFactory {
  + getBean(name: String): Object
  + getBean(name: String, requiredType: Class<T>): T
  + getBean(name: String, args: Object[]): Object
  + containsBean(name: String): boolean
  + isSingleton(name: String): boolean
  ' check if the bean is configured with prototype scope or not
  + isPrototype(name: String): boolean
}
interface ListableBeanFactory extends BeanFactory {}
interface HierarchicalBeanFactory extends BeanFactory {}
interface ApplicationContext extends ListableBeanFactory, HierarchicalBeanFactory {}
@enduml
```
![](https://plantuml-server.kkeisuke.dev/svg/bP91ImD138Nl_HMvgTXVKAHK2-91KEZUYeViDBkREfsicInj4V-xgLZPGhVWPGvltfUNUSmi6wfrcpZYPAGL1e87mlI8mKJty3a2k8MQx21U9zpG11QcdEgR2RoKQmesw1Y3qaV7IgjYtxewZvZpNJ5rihW0eTRvE7lvTXeJ91bookUsAKMYopy-pWiN8vbSi5r1Q2Yy0rTW3K7fgeE7Z8hhpjU6BLi3hOg9-GiW1_5J59BORyphyN8evgjNx3DxssMaVi6qCqghV5fw7tfYKjJGSC3uB_2-RQD3nfBcNflx_vWpYum7Wtpep2d_8zy0.svg)