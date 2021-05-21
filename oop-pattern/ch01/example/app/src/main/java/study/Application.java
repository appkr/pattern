package study;

public class Application {

//  private Menu menu1 = new Menu("menu1");
//  private Menu menu2 = new Menu("menu2");
//  private Button button1 = new Button("button1");
//  private Button button2 = new Button("button2");

  private ScreenUI currentScreen = null;

  public Application() {
//    menu1.setOnClickListener(this);
//    menu2.setOnClickListener(this);
//    menu3.setOnClickListener(this);
//    button1.setOnClickListener(this);
//    button2.setOnClickListener(this);
  }

  public OnClickListener menuListener = new OnClickListener() {
    @Override
    public void clicked(Component eventSource) {
      String sourceId = eventSource.getId();
      if (sourceId.equals("menu1")) {
        currentScreen = new Menu1ScreenUI();
      } else if (sourceId.equals("menu2")) {
        currentScreen = new Menu2ScreenUI();
      } else if (sourceId.equals("menu3")) {
        currentScreen = new Menu3ScreenUI();
      }
      currentScreen.show();
    }
  };

  public OnClickListener buttonListener = new OnClickListener() {
    @Override
    public void clicked(Component eventSource) {
      if (currentScreen == null) {
        return;
      }
      String sourceId = eventSource.getId();
      if (sourceId.equals("button1")) {
        currentScreen.handleButton1Click();
      } else if (sourceId.equals("button2")) {
        currentScreen.handleButton2Click();
      }
    }
  };
}
