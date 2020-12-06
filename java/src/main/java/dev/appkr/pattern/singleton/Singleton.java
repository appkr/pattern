package dev.appkr.pattern.singleton;

public class Singleton {

    private static Singleton INSTANCE = new Singleton();

    private Singleton() {}

    public static Singleton getInstance() {
        try {
            // For Test
            Thread.sleep(2000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

        return INSTANCE;
    }
}
