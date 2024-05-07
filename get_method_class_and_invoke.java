import java.lang.reflect.Method;


public class test {

    public static void main(String[] args){
        try {
            Class<?> myClass = apalah.class;
            String prefix = "a";
            Method b = myClass.getDeclaredMethod("get" + prefix);
            apalah obj = new apalah();
            String res = b.invoke(obj).toString();
            System.out.println(res);
        } catch(Exception e) {
            e.printStackTrace();
        }

    }
    
}

class apalah {

    public String geta() {
        return "hello world";
    }

}
