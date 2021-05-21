package study.templatemethod;

public class Auth {

  private String id;

  public Auth(String id) {
    this.id = id;
  }

  public String getId() {
    return id;
  }

  @Override
  public String toString() {
    return "Auth{" +
        "id='" + id + '\'' +
        '}';
  }
}
