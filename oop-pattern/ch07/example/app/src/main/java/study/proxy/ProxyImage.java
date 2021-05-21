package study.proxy;

public class ProxyImage implements Image {

  String path;
  RealImage image;

  public ProxyImage(String path) {
    this.path = path;
  }

  @Override
  public void draw() {
    if (image == null) {
      image = new RealImage(path); // 캐슁
    }
    image.draw();
  }
}
