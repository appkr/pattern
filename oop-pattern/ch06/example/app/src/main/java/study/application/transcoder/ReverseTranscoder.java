package study.application.transcoder;

import study.application.Transcoder;

public class ReverseTranscoder implements Transcoder {
  @Override
  public String transcode(String source) {
    return new StringBuilder(source).reverse().toString();
  }
}
