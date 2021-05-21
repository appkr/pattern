package study.decorator;

public class App {

  public static void main(String[] args) {
    FileOut fileOut = new EncryptionOut(new ZipOut(new FileOutImpl()));
    fileOut.write(new byte[]{65, 66, 67});
  }
}
