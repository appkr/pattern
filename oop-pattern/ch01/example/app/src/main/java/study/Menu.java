package study;

public class Menu implements Component {
  private String id;

  public Menu(String id) {
    this.id = id;
  }

  public Menu() {
  }

  @Override
  public String getId() {
    return id;
  }

  @Override
  public void setOnClickListener(OnClickListener listener) {
    //
  }
}
