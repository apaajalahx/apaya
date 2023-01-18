class TestExtend<T>{

    public getOne(object: Partial<T>){
        console.log(object);
    }

}

class Metadata {

    id: number = 0;

    text: string = '';

}

class Test extends TestExtend<Metadata>{

    get(){
        this.getOne({ id: 1, text: 'oke' });
    }
}

const callClass = new Test();
callClass.get();
