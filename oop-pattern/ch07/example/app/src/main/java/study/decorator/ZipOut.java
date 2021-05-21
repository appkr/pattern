package study.decorator;

public class ZipOut extends Decorator {

  public ZipOut(FileOut delegate) {
    super(delegate);
  }

  @Override
  public void write(byte[] data) {
    System.out.println("data를 압축합니다");
    super.doDelegate(data);
  }
}
