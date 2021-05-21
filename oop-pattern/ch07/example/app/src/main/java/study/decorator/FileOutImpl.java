package study.decorator;

public class FileOutImpl implements FileOut {
  @Override
  public void write(byte[] data) {
    System.out.println("data를 파일에 씁니다: " + new String(data));
  }
}
