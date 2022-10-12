package dev.appkr.pattern.optional;

import java.util.Optional;
import org.junit.jupiter.api.Test;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class PersonTest {

  static final Logger log = LoggerFactory.getLogger(PersonTest.class);

  @Test
  void car() {
    final Person person = new Person(Optional.of(new Car(Optional.of(new Insurance("FirstMarine")))));
    final String insuranceName = Optional
        .of(person)               // Optional<Person>
        .flatMap(Person::car)     // Optional<Car>
        .flatMap(Car::insurance)  // Optional<Insurance>
        .map(Insurance::name)     // Optional<String>
        .orElse("unknown"); // String

    log.info("insurance name: {}", insuranceName);
  }

  @Test
  void car2() {
    final Person person = new Person(Optional.empty());
    final String insuranceName = Optional
        .of(person)
        .flatMap(Person::car)
        .flatMap(Car::insurance)
        .map(Insurance::name)
        .orElse("unknown");

    log.info("insurance name: {}", insuranceName);
  }
}
