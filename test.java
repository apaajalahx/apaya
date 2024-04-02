import java.util.ArrayList;
import java.util.EnumMap;
import java.util.List;
import java.util.Map;

/*
 * 
 * Banyak enum.
 * 
 */

enum Abc {

    A("a"),
    B("b"),
    C("c");

    String code;

    Abc(String code) {
        this.code = code;
    }

    @Override
    public String toString() {
        return this.code;
    }
}

enum Def {

    D("d"),
    E("e"),
    F("f");

    String code;

    Def(String code) {
        this.code = code;
    }

    @Override
    public String toString() {
        return this.code;
    }
}

public class test {

    public static void main(String[] args){
        Abc[] data = Abc.values();
        Def[] defData = Def.values();
        List<Map<String, Object>> abc = convert(data);
        List<Map<String, Object>> def = convert(defData);
        System.out.println(abc);
        System.out.println(def);
    }

    public static <T extends Enum<T>> List<Map<String, Object>> convert(T[] enumdata) {
        List<Map<String, Object>> returnData = new ArrayList<>();
        for (T data: enumdata) {
            System.out.println(data.name() + " " + data.toString());
            Map<String, Object> a = new HashMap<>();
            a.put(data.name(), data.toString());
            returnData.add(a);
        }
        return returnData;
    }
    
}
