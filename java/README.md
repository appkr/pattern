## Pattern

### Object Pool Pattern
- @see https://www.geeksforgeeks.org/object-pool-design-pattern/
- @see https://commons.apache.org/proper/commons-pool/

### Thread-safe Singleton
- @see https://blog.seotory.com/post/2016/03/java-singleton-pattern
- @see https://www.geeksforgeeks.org/singleton-design-pattern-introduction/
- @see https://www.geeksforgeeks.org/singleton-design-pattern/
- @see https://www.youtube.com/watch?v=EHT23oyx3Ts

**Singleton 스펙**
1. It should have only one instance
2. Instance should be globally accessible

**Singleton 설계시 주의점**
1. 상속을 한다면?
2. 객체를 clone 한다면?
3. 직렬화했다가 역직렬화한다면?
4. 리플렉션으로 새 인스턴스를 만든다면?
 