package study.builder;

public class App {

  public static void main(String[] args) {
    BankAccount bankAccount = BankAccount.builder()
        .accountNumber(19731201)
        .owner("김주원")
        .branch("서울 면목")
        .balance(100.0)
        .interestRage(0.1)
        .build();

    System.out.println(bankAccount);
  }
}
