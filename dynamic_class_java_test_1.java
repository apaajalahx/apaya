
public class Application {
    
    public static void main(String[] args) {
        Test test = new Test();
        Application.testCall(test);

    }


    public static void testCall(TestDynamic abc) {
        Call call = new Call();
        TestDynamic test = call.getClassTest(abc);
        
        System.out.println(test.test());
    }
}


interface TestDynamic {
    
    String test();
    
    void upload();

}

class Call {

    public TestDynamic getClassTest(TestDynamic abc) {
        return abc;
    }

}

class Test implements TestDynamic{
    
    @Override
    public String test() {
        return "hello world";
    }

    @Override
    public void upload() {
        // pass
    }

}
