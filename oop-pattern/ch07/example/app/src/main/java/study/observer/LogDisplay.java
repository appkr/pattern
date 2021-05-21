package study.observer;

import static java.nio.file.StandardOpenOption.APPEND;
import static java.nio.file.StandardOpenOption.CREATE;

import java.io.File;
import java.io.IOException;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;

public class LogDisplay implements Display {

  Path logPath;

  public LogDisplay(String path) {
    this.logPath = new File(new File(path).getAbsolutePath()).toPath();
  }

  @Override
  public void update(Sensor observable) {
    String output = (observable instanceof HumiditySensor)
        ? String.format("현재 습도는 %d%% 입니다\n", observable.getState())
        : String.format("현재 온도는 %d°C 입니다\n", observable.getState());

    try {
      Files.write(logPath, output.getBytes(StandardCharsets.UTF_8), APPEND, CREATE);
    } catch (IOException e) {}
  }
}
