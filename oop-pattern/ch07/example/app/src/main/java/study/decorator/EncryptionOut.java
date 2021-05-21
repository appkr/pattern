package study.decorator;

public class EncryptionOut extends Decorator {

  public EncryptionOut(FileOut delegate) {
    super(delegate);
  }

  @Override
  public void write(byte[] data) {
    System.out.println("data를 암호화합니다");
    super.doDelegate(data);
  }
}
