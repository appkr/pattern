package study;

public class Button implements Component {

  private String id;

  public Button(String id) {
    this.id = id;
  }

  public Button() {
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
