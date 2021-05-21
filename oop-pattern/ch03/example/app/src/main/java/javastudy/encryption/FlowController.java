package javastudy.encryption;

public class FlowController {

  public static void main(String[] args) {
    final FlowController app = new FlowController();
    app.process();
  }

  public void process() {
    final ByteSource source = ByteSourceFactory.getInstance().createFor("file");
    final byte[] data = source.read();

    final Encryptor encryptor = new Encryptor();
    final byte[] encryptedData = encryptor.encrypt(data);

    final FileDataWriter writer = new FileDataWriter();
    writer.write(encryptedData);
  }
}
