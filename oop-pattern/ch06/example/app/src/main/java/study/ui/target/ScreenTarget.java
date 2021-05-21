package study.ui.target;

import study.ui.Target;

public class ScreenTarget implements Target {
  @Override
  public void flush(String source) {
    System.out.println("\u001B[31m>>> " + source + "\u001B[0m");
  }
}
