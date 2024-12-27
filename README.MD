Understanding OOP in PHP:

1 - Goal of the OOP:
    Definition: Modeling real-world entities using objects.
    Object-Oriented Programming (OOP), where real-world entities such as people, places, or things are represented as objects. These objects encapsulate attributes (data or properties) and methods (functions or behaviors) to model their characteristics and actions. It allows for a structured, reusable, and modular approach to programming.
    
    Reusability: Code can be reused across projects through inheritance and the use of libraries or frameworks, reducing redundancy and speeding up development.
    Scalability: OOP supports the creation of modular and extensible systems that can handle increasing complexity as new features or requirements are added.
    Maintainability: Encapsulation and organized code structures make it easier to update, debug, and understand the codebase over time.



2 - Core OOP Concepts:
    - Encapsulation : encapsulation is one of the core concepts of oop it means hidding the internal details of an object only exposing what is nesessary , 
                in programming : concept encpsulation protects the data inside an object 
                EXAMPLE : Remote Control , The Bank ;

    - Abstraction : Also Abstraction Of the fundamental Concepts in OOP also like encapsulation it involves hidding the implemention datails of a features and
                the complex part of the programme , Think if it like a way to simplify or hidding the complex systems .
                EXAMPLE : TV , We can't See how the tv work and we don't need to know how it works , the complex part is hidden and just all we need is buttons to interact with the tv .

    - Inheritance : REAL LIFE EXAMPLE :
                Imagine you're buiting a software for university system and you have different types of people such  as students and teachers . both of them share some common properties like name and age , but each has unique properties and behaviors
                parent class : 
                            - Person : // Person Has a properties like name , birthday , email , ... ;
                child class : 
                            - Student : // Student has the same properties of the parent class (Person) with other Student Properties Like Level;
                            - Teacher : // Also The Teacher class has the same properties of the parent class with other Teacher Properties Like Subject;

    - Polymorphism : Polymorphism in OOP means that the same action can behave differently depending on the object performing it.
                EXAMPLE : A dog and a cat both have a speak() method, but the dog barks, and the cat meows.



3 - Classes and Objects:
    3.1 Overview:
            3.1.1 Classes : A class is like a template for creating objects , it encapsulating data (Properties) And Methods (Functions).
                Its like a template that describe the structure and behavior of objects .
            3.1.2 Objects : Object is an instance of classes or like the result of the class imagine like is the class is the recipe and the object is the result of this 
                recipe.

            3.1.3 Key Points : classes Are Template while objects are real world instance based on those templates .
                        Objects Are independent , you can create multiple Objects From single class , each class with own stats. 
    3.2 Defining a class and creating an object
        3.2.1 Define A Class With Properties and Method Like This Exemple :
```php
        <?php 
            class SKAYMember {
                // Examples For Properties
                // Public property +
                public $name;

                // Protected property # 
                protected $age;

                // Private property -
                private $role;

                // Method to display member information
                public function displayInfo() {
                    return "Your Name is : {$this->name} \nYour Age Is : {$this->age}\nYour Role : {$this->role}";
                }
            }
```
        3.2.2 creating an object After That :
```php
        $member = new SKAYMember;
        $member->name = "jawad";
        $member->age = 21;
        $member->role = "student";
        echo $member->displayInfo();
    ?>
```
    
    3.3 Constructors and Destructors
        3.3.1 Constructors
            - A constructor is a special method in a class that is automatically called when an object of the class 
              is created. Its primary purpose is to initialize the properties of the object.

        Exemple : 
```php
class SKAYMember {
    // Public property 
    
    public $name;
    public $age;
    public $role;

    public function __construct($name,$age,$role)
    {
        $this->name = $name;
        $this->age = $age;
        $this->role = $role;
        return "Your Name is : {$name} \nYour Age Is : {$age}\nYour Role : {$role}";
    }
}

$member = new SKAYMember("Jawad",21,"student");
print_r($member) ;
```
        3.3.2 Destructors
            - A destructor is a special method in a class that is automatically called when an object is destroyed  
              or goes out of scope. It is primarily used to clean up resources, such as closing database connections or releasing file handles.
              A destructor is like a cleanup crew that ensures everything is properly closed or cleaned up when an object is no longer needed.
        Exemple : 
```php
class SKAYMember {
    // Public property 
    
    public $name;
    public $age;
    public $role;

    public function __construct($name,$age,$role)
    {
        $this->name = $name;
        $this->age = $age;
        $this->role = $role;
        return "Your Name is : {$name} \nYour Age Is : {$age}\nYour Role : {$role}";
    }
    public function __destruct()
    {
        echo "Session ended for user: {$this->name}\n";
    }
}

$member = new SKAYMember("Jawad",21,"student");
print_r($member) ;
```
Result :
```git
SKAYMember Object
(
    [name] => Jawad
    [age] => 21
    [role] => student
)
Session ended for user: Jawad
```

    3.4 Access Modifiers:
        3.4.1 Types of Access Modifiers in PHP
            3.4.1.1 public
                Members declared as public are accessible from anywhere: inside the class, subclasses, and even outside the class.
                Example:
```php
            class Example {
                public $name = "Public Access";
            }

            $obj = new Example();
            echo $obj->name; // Output: Public Access
```
            3.4.1.2 protected
                Members declared as protected are accessible within the class itself and its child (subclass), but not from outside the class.
```php
            class Example {
                protected $name = "Protected Access";

                public function getName() {
                    return $this->name;
                }
            }

            $obj = new Example();
            echo $obj->getName(); // Output: Protected Access
```
            3.4.1.3 private
                Members declared as private are accessible only within the class in which they are declared.
                They cannot be accessed or inherited by child classes.
```php
            class Example {
                private $name = "Private Access";

                public function getName() {
                    return $this->name;
                }
            }

            $obj = new Example();
            echo $obj->getName(); // Output: Private Access
```

4 Interfaces et Traits :
        4.1 Interfaces 
            Interfaces define a contract for classes. They specify methods that a class must implement, without providing any implementation details. This ensures consistency and enforces a common structure across different classes, even if they are unrelated.
        
        4.2 Traits 
            Traits are a mechanism for reusing code in multiple classes. They allow you to define methods and properties that can be shared across classes, avoiding duplication and promoting code reuse. Unlike inheritance, traits are not meant for establishing relationships between classes. 
        
5 Namespaces and Autoloading in PHP :
        5.1 What Are Namespaces?
            Namespaces in PHP are a way to encapsulate and organize classes, interfaces, functions, and constants into separate, logical groups. They help avoid name collisions, especially in large applications or when integrating third-party libraries.
```php
namespace App\Models;

class User {
    public function getName() {
        return "John Doe";
    }
}

// File: index.php
require_once 'User.php';

use App\Models\User;

$user = new User();
echo $user->getName(); // Outputs: John Doe
```
        5.2 Autoloading in PHP is a mechanism to automatically load required class files when they are used, without manually including them with require or 
            include. This is achieved using an autoloader function.

```php
spl_autoload_register(function ($className) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
```


6 Magical Methods in PHP :
        Magical methods in PHP are special methods that start with double underscores (__) and have predefined purposes. PHP calls them automatically when specific events occur in your class. They make object-oriented programming more dynamic and powerful.
        6.1 __construct :
            Called automatically when an object is created. It's used to initialize properties or perform setup tasks.
```php
class User {
    public $name;

    public function __construct($name) {
        $this->name = $name;
        echo "User $name created!";
    }
}

$user = new User("Jawad"); // Outputs: User Jawad created!
```
        6.2 __destruct : 
            Called when an object is destroyed (e.g., at the end of a script or when using unset). It's used for cleanup tasks.
```php
class User {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function __destruct() {
        echo "User {$this->name} destroyed!";
    }
}

$user = new User("Jawad");
unset($user); // Outputs: User Jawad destroyed!
```
        
        6.3 __get:
            Called when trying to access a property that is not accessible or does not exist.
```php
class User {
    private $data = [];

    public function __get($name) {
        return $this->data[$name] ?? "Property $name not found.";
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}

$user = new User();
$user->age = 21; // Uses __set to set age
echo $user->age; // Uses __get to retrieve age
echo $user->name; // Outputs: Property name not found.
```






    