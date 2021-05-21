package study.proxy;

import java.util.ArrayList;
import java.util.List;

import static java.util.Arrays.asList;

public class App {

  public static void main(String[] args) {
    List<String> paths = asList("a", "b", "c", "d", "e");
    List<Image> images = new ArrayList<Image>(paths.size());
    for (int i = 0; i < paths.size(); i++) {
      if (i <= 4) {
        images.add(new RealImage(paths.get(i)));
      } else {
        images.add(new ProxyImage(paths.get(i)));
      }
    }

    ListUI listUI = new ListUI(images);
    listUI.onScroll(0, 4);
  }
}
