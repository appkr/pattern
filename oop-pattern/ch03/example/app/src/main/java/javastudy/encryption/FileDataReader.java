package javastudy.encryption;

public class FileDataReader implements ByteSource {
  @Override
  public byte[] read() {
    System.out.println("파일로부터 데이터를 읽습니다");
    return new byte[0];
  }
}
