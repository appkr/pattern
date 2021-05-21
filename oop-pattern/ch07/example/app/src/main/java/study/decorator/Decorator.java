package study.decorator;

public abstract class Decorator implements FileOut{

  FileOut delegate;

  public Decorator(FileOut delegate) {
    this.delegate = delegate;
  }

  protected void doDelegate(byte[] data) {
    delegate.write(data);
  }
}
