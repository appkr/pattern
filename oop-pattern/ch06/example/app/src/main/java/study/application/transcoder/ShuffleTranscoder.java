package study.application.transcoder;

import study.application.Transcoder;

import java.util.Collections;
import java.util.List;

import static java.util.Arrays.asList;

public class ShuffleTranscoder implements Transcoder {
  @Override
  public String transcode(String source) {
    List<String> letters = asList(source.split(""));
    Collections.shuffle(letters);

    return String.join("", letters);
  }
}
