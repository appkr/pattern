package study.proxy;

public class RealImage implements Image {

  String path;

  public RealImage(String path) {
    this.path = path;
  }

  @Override
  public void draw() {
    System.out.println(path + "에 있는 이미지를 표시합니다");
  }
}
