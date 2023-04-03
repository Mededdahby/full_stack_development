import java.util.*;

public class Test {
    public static void main(String[] args) {
        shape s = new shape();
        s.affiche();
    }
}

public class shape {

    public void affiche() {
        System.out.println("I'm a shep");
    }
}

public class rectangle extends shape {

    public void affiche() {
        System.out.println("I'm a rectangle");
    }
}

public class circle extends shape {

    public void affiche() {
        System.out.println("I'm a circle");
        
    }
}