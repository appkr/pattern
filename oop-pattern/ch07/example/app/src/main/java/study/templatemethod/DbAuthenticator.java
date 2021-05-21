package study.templatemethod;

public class DbAuthenticator extends Authenticator{

  @Override
  protected boolean doAuthenticate(String id, String pw) {
    return true;
  }

  @Override
  protected Auth createAuth(String id) {
    return new Auth(id);
  }
}
