package javastudy.encryption;

public class SocketDataReader implements ByteSource{
  @Override
  public byte[] read() {
    System.out.println("소켓으로부터 데이터를 읽습니다");
    return new byte[0];
  }
}
