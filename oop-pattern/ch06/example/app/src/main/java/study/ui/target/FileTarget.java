package study.ui.target;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import study.ui.Target;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.nio.file.StandardOpenOption;

public class FileTarget implements Target {

  private Logger log = LoggerFactory.getLogger(getClass());
  private String filename;

  public FileTarget(String filename) {
    this.filename = filename;
  }

  @Override
  public void flush(String source) {
    source = source + "\n";
    try {
      String path = getClass().getClassLoader().getResource(filename).getPath();
      log.info("flushing result to {}", path);
      Files.write(Paths.get(path), source.getBytes(), StandardOpenOption.APPEND);
    } catch (IOException e) {
      e.printStackTrace();
    }
  }
}
