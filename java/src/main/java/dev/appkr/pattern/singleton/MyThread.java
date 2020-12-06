package dev.appkr.pattern.singleton;

public class MyThread implements Runnable {

    @Override
    public void run() {
        final Singleton instance = Singleton.getInstance();
        System.out.println(Thread.currentThread().getName() + " " + instance.hashCode());
    }
}
