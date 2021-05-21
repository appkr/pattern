package study;

import java.time.LocalDate;

public class App {
  public static void main(String[] args) {
    MemberService service = new MemberService();
    // 2020-03-01에 만료된 남성 회원
    Member johnDoe = new Member("Jane Doe", LocalDate.parse("2021-03-01"), true);
    service.handleRequest(johnDoe);

    // 2020-03-01에 만료된 여성 회원
    Member janeDoe = new Member("Jane Doe", LocalDate.parse("2021-03-01"), false);
    service.handleRequest(janeDoe);
  }
}
