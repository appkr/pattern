package javastudy.encryption;

public class ByteSourceFactory {

  public ByteSource createFor(String type) {
    switch (type) {
      case "file":
        return new FileDataReader();
      case "socket":
        return new SocketDataReader();
      default:
        throw new IllegalArgumentException();
    }
  }

  private static ByteSourceFactory instance = new ByteSourceFactory();

  public static ByteSourceFactory getInstance() {
    return instance;
  }

  private ByteSourceFactory() {
  }
}
