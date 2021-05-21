package study;

public class MemberService {

  public void handleRequest(Member member) {
    if (member.isExpired()) {
      System.out.println(String.format("%s님은 %s에 가입 기간이 만료되어 서비스를 사용하실 수 없습니다",
          member.getName(),  member.getExpiryDate()));
    }
  }
}
