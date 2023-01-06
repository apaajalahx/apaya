# Python Parent and Child.

class A:
    
    def print_child_class_name(self):
        print('Child Class', self.__class__.__name__)

class C:
    pass

class B(A, C):

    def print_parent_class_name(self):
        print('Single Parent Class', self.__class__.__base__.__name__)
    
    def print_multiple_parent_class_name(self):
        for classes in self.__class__.__bases__:
            print('Multiple Class {}'.format(classes.__name__))



getClass = B() 
getClass.print_child_class_name()
getClass.print_parent_class_name()
getClass.print_multiple_parent_class_name()
