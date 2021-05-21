package study.facade;

public class OrderServiceFacadeImpl implements OrderServiceFacade {

  @Override
  public Product placeOrder(int productId) {
    Product product = findProduct(productId);
    if (InventoryService.isAvailable(product)) {
      if (PaymentService.makePayment(product.getPrice())) {
        ShippingService.shipProduct(product);
      }
    }

    return product;
  }

  Product findProduct(int productId) {
    return new Product(productId, "옥토끼 별사탕", 100);
  }
}
