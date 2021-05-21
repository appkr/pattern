package study;

public class Menu3ScreenUI implements ScreenUI {

  @Override
  public void show() {
    System.out.println("메뉴 3 화면으로 전환");
  }

  @Override
  public void handleButton1Click() {
    System.out.println("메뉴 3 화면의 버튼 1 처리");
  }

  @Override
  public void handleButton2Click() {
    System.out.println("메뉴 3 화면의 버튼 2 처리");
  }
}
