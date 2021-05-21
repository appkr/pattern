package study.state;

import lombok.extern.slf4j.Slf4j;

@Slf4j
public class App {

  public static void main(String[] args) {
    VendingMachine vm = new VendingMachine(7);
    vm.insertCoin(1000);

    log.info("뽑은 커피 {}, 자판기 상태 {}", vm.select(Coffee.NORMAL), vm);
    log.info("뽑은 커피 {}, 자판기 상태 {}", vm.select(Coffee.NORMAL), vm);
    log.info("뽑은 커피 {}, 자판기 상태 {}", vm.select(Coffee.NORMAL), vm);
    log.info("뽑은 커피 {}, 자판기 상태 {}", vm.select(Coffee.NORMAL), vm);
    log.info("뽑은 커피 {}, 자판기 상태 {}", vm.select(Coffee.PREMIUM), vm);
    log.info("뽑은 커피 {}, 자판기 상태 {}", vm.select(Coffee.PREMIUM), vm);
    log.info("뽑은 커피 {}, 자판기 상태 {}", vm.select(Coffee.PREMIUM), vm);
  }
}
