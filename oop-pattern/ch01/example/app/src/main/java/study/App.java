package study;

public class App {
  public static void main(String[] args) {
    Application app = new Application();
    app.menuListener.clicked(new Menu("menu1"));
    app.buttonListener.clicked(new Button("button1"));
    app.buttonListener.clicked(new Button("button2"));

    app.menuListener.clicked(new Menu("menu2"));
    app.buttonListener.clicked(new Button("button1"));
    app.buttonListener.clicked(new Button("button2"));

    app.menuListener.clicked(new Menu("menu3"));
    app.buttonListener.clicked(new Button("button1"));
    app.buttonListener.clicked(new Button("button2"));
  }
}
