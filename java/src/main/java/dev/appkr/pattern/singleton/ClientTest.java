package dev.appkr.pattern.singleton;

import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

public class ClientTest {

    public static void main(String[] args) {
        ExecutorService es = null;
        final MyThread myThread = new MyThread();

        try {
            es = Executors.newFixedThreadPool(5);
            es.execute(myThread);
            es.execute(myThread);
            es.execute(myThread);
            es.execute(myThread);
            es.execute(myThread);
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            es.shutdown();
        }
    }
}
