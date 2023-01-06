# Python Parent and Child.
# call parent name.
# call child name.

class A:
    
    def print_child_class_name(self):
        print(self.__class__.__name__)


class B(A):

    def print_parent_class_name(self):
        print(self.__class__.__base__.__name__)


getClass = B() 
getClass.print_child_class_name()
getClass.print_parent_class_name()
