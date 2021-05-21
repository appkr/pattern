package study.facade;

public class Product {

  int productId;
  String name;
  int price;

  public Product() {
  }

  public Product(int productId, String name, int price) {
    this.productId = productId;
    this.name = name;
    this.price = price;
  }

  public int getProductId() {
    return productId;
  }

  public String getName() {
    return name;
  }

  public int getPrice() {
    return price;
  }

  @Override
  public String toString() {
    return "Product{" +
        "productId=" + productId +
        ", name='" + name + '\'' +
        ", price=" + price +
        '}';
  }
}
