package study.templatemethod;

public abstract class Authenticator {

  public Auth authenticate(String id, String pw) {
    if (!doAuthenticate(id, pw)) {
      throw new RuntimeException();
    }

    return createAuth(id);
  }

  protected abstract boolean doAuthenticate(String id, String pw);

  protected abstract Auth createAuth(String id);

}
