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

### Visitor
- @see https://www.youtube.com/watch?v=pL4mOUDi54o

![](https://plantuml-server.kkeisuke.dev/svg/bP6x3i8m34LtVuKtMg4YM8j0V04JOazJ8qLAaoe9Bo7-7VUHWjekR57kiNqI7tmGBbmh3Q1C87SHal2il0gYq8GlG5oYa9BgaDoQQ-loBhSkpR6qLyRW3I2ry1vFjc3OegfgJHMPu4VDCgoTaZIjF98ap-JphzgHitMzSQlQ2JVbUHJxAizIWyJSqyGZpXWRDcEP-zfc-nX01BBItat6GMyo3ORX00kyA2FqqBt_UToXeVkFIP9kcMtlkgx9Pfsk-53Ji2v6u42cv1r_0000.svg)

### DSL
- 모던 자바 인 액션, ch10 람다를 이용한 도메인 전용 언어, p 344 10.3.3 람다 표현식을 이용한 함수 시퀀싱

![](https://plantuml-server.kkeisuke.dev/svg/LOyz3iCW34PtJk4Bv08CLMxGeTsg3WIi2eMVr9WXgdBtEf2sweBb9zx7nrZO4DSObBB1b09dSaZmKW03s5euHoGD5oQV7Wqo6OT5mtMVjxlQFcO3XydhWd95phPAZ9tt51aDFAj9x7dLu1Ctif2tehXSfu2_qAOSeMMDKmv_PQAX6VcBHElzyt3gVLHl9Mj_N8sOd7pt3G00.svg)

### Optional
- 모던 자바 인 액션, ch11 null 대신 Optional 클래스, p 375 11.3.3 flatMap으로 Optional 객체 연결
