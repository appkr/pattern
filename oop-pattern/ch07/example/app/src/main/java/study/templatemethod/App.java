package study.templatemethod;

import lombok.extern.slf4j.Slf4j;

@Slf4j
public class App {

  public static void main(String[] args) {
    try {
      final Auth auth = new LdapAuthenticator().authenticate("John", "secret");
      log.info("Login success {}", auth);
    } catch (Exception e) {
      log.error("Login failed");
    }
  }
}
