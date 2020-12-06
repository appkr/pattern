package dev.appkr.springioc.module1;

import lombok.Getter;
import lombok.RequiredArgsConstructor;
import lombok.Setter;
import lombok.ToString;

@RequiredArgsConstructor
@Getter
@Setter
@ToString
public class Address {

  private final String street;
  private final int number;
}
