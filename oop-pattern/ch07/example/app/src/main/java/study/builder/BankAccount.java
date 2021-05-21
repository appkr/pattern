package study.builder;

public class BankAccount {

  private long accountNumber;
  private String owner;
  private String branch;
  private double balance;
  private double interestRate;

  public static Builder builder() {
    return new Builder();
  }

  private BankAccount(Builder builder) {
    this.accountNumber = builder.accountNumber;
    this.owner = builder.owner;
    this.branch = builder.branch;
    this.balance = builder.balance;
    this.interestRate = builder.interestRate;
  }

  @Override
  public String toString() {
    return "BankAccount{" +
        "accountNumber=" + accountNumber +
        ", owner='" + owner + '\'' +
        ", branch='" + branch + '\'' +
        ", balance=" + balance +
        ", interestRate=" + interestRate +
        '}';
  }

  static class Builder {

    private long accountNumber;
    private String owner;
    private String branch;
    private double balance;
    private double interestRate;

    public BankAccount build() {
      return new BankAccount(this);
    }

    public Builder accountNumber(long accountNumber) {
      this.accountNumber = accountNumber;
      return this;
    }

    public Builder owner(String owner) {
      this.owner = owner;
      return  this;
    }

    public Builder branch(String branch) {
      this.branch = branch;
      return this;
    }

    public Builder balance(double balance) {
      this.balance = balance;
      return this;
    }

    public Builder interestRage(double interestRate) {
      this.interestRate = interestRate;
      return this;
    }
  }
}
