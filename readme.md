# OOP (Object Oriented Programming (Lập trình hướng đối tượng))



## Khái niệm
Lập trình hướng đối tượng là một mô hình lập trình trong khoa học máy tính dựa trên khái niệm về **lớp (classes)** và **đối tượng (objects)**. Nó được sử dụng để cấu trúc một chương trình phần mềm thành các đoạn code đơn giản, có thể tái sử dụng (thường được gọi là các lớp), được sử dụng để tạo các phiên bản riêng lẻ của các đối tượng.



## Cấu trúc của OOP

 - **Classes:** Lớp là các kiểu dữ liệu do người dùng xác định, đóng vai trò là bản thiết kế chi tiết cho các đối tượng, thuộc tính và phương thức.

 - **Objects:** Đối tượng là các thể hiện của một lớp có dữ liệu được xác định cụ thể. Khi một lớp được định nghĩa ban đầu, phần mô tả là đối tượng duy nhất được định nghĩa.

 - **Methods:** Phương thức là các hàm được định nghĩa bên trong một lớp mô tả hành vi của một đối tượng. Chúng rất hữu ích cho việc tái sử dụng hoặc giữ chức năng được gói gọn bên trong một đối tượng tại một thời điểm. Khả năng sử dụng lại code là một lợi ích lớn khi gỡ lỗi.

 - **Attributes:** Thuộc tính là thông tin được lưu trữ. Các thuộc tính được xác định trong mẫu Lớp. Khi các đối tượng được khởi tạo, các đối tượng riêng lẻ sẽ chứa dữ liệu được lưu trữ trong trường Thuộc tính.

```php
<?php
// Lớp
class Fruit {
    public $name;
    public $color;

    // Phương thức
    function setName($name) {
        $this -> name = $name;
    }
    function getName() {
        return $this -> name;
    }

    function setColor($color) {
        $this -> color = $color;
    }
    function getColor() {
        return $this -> color;
    }
}

// Đối tượng
$apple = new Fruit();
$banana = new Fruit();

$apple -> setName("Apple");
$apple -> setColor("Red");

$banana -> setName("Banana");

echo "Name: " . $apple->getName(); //In ra "Name: Apple"
echo "Color: " . $apple->getColor(); //In ra "Color: Red"

echo PHP_EOL;

echo $banana->getName();    //In ra "Name: Banana"
?>
```


## Nguyên tắc của OOP
Bốn trụ cột của lập trình hướng đối tượng là:

 - **Inheritance (Tính kế thừa):** lớp con kế thừa dữ liệu và hành vi từ lớp cha

 - **Encapsulation (Tính đóng gói):** chứa thông tin trong một đối tượng, chỉ hiển thị thông tin được chọn

 - **Abstraction (Tính trừu tượng):** chỉ hiển thị các phương thức công khai cấp cao để truy cập một đối tượng

 - **Polymorphism (Tính đa hình):** nhiều phương thức có thể thực hiện cùng một nhiệm vụ


### Inheritance
Tính kế thừa cho phép các lớp kế thừa các tính năng của các lớp khác. Nói cách khác, lớp cha mở rộng các thuộc tính và hành vi cho lớp con. **Kế thừa hỗ trợ khả năng sử dụng lại.**

Lợi ích của việc kế thừa là các chương trình có thể tạo một lớp cha chung và sau đó tạo các lớp con cụ thể hơn nếu cần. Điều này giúp đơn giản hóa việc lập trình vì thay vì phải tạo lại cấu trúc của lớp nhiều lần, **các lớp con sẽ tự động có quyền truy cập vào các chức năng trong lớp cha của chúng.**

```php
<?php
class Fruit {
    public $name;
    public $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function intro() {
        echo "Đây là {$this->name} và màu của nó là {$this->color}.";
    }
}

// Strawberry kế thừa từ Fruit
class Strawberry extends Fruit {
    public function message() {
        echo "Tôi là trái cây hay quả mọng?";
    }
}

$strawberry = new Strawberry("Strawberry", "red");
$strawberry->message(); //In ra "Tôi là trái cây hay quả mọng?"
$strawberry->intro();   //In ra "Đây là Strawberry và màu của nó là red."
?>
```


### Encapsulation
Đóng gói có nghĩa là chứa tất cả thông tin quan trọng **bên trong một đối tượng** và chỉ hiển thị thông tin đã chọn ra bên ngoài. Các thuộc tính và hành vi được xác định bằng code bên trong mẫu lớp.

Sau đó, khi một đối tượng được khởi tạo từ lớp, dữ liệu và phương thức sẽ được gói gọn trong đối tượng đó. Đóng gói ẩn việc triển khai code phần mềm nội bộ bên trong một lớp và ẩn dữ liệu nội bộ của các đối tượng bên trong.

Việc đóng gói yêu cầu xác định một số trường là riêng tư và một số trường là công khai:

 - **Private/ Internal interface (Giao diện riêng/nội:)** Các phương thức và thuộc tính có thể truy cập được từ các phương thức khác cùng lớp.

 - **Public / External Interface (Giao diện công khai/ngoài):** Các phương thức và thuộc tính có thể truy cập từ bên ngoài lớp.

```php
<?php 
class Student { 
    private $firstname; 
    private $gender; 
   
    public function getFirstName() { 
        return $this->firstname; 
    } 
   
    public function setFirstName($firstname) { 
        $this->firstname = $firstname; 
        echo("First name is set to " . $firstname); 
        echo("<br>"); 
    } 
   
    public function getGender() { 
        return $this->gender; 
    } 
   
    public function setGender($gender) { 
        if ('Male' !== $gender and 'Female' !== $gender) { 
            echo('Set gender as Male or Female for gender'); 
        } 
   
        $this->gender = $gender; 
        echo("Gender is set to ".$gender); 
        echo("<br>"); 
    } 
} 
   
$student = new Student(); 
$student->setFirstName('Meena');    //In ra "First name is set to Meena"
$student->setGender('Female');      //In ra "Gender is set to Female"
?> 
```

Đóng gói tăng thêm **tính bảo mật**. Các thuộc tính và phương thức có thể được đặt ở chế độ riêng tư, do đó chúng không thể được truy cập bên ngoài lớp. Để lấy thông tin về dữ liệu trong một đối tượng, các phương thức và thuộc tính công khai được sử dụng để truy cập hoặc cập nhật dữ liệu.


### Abstraction
Tính trừu tượng là một phần mở rộng của việc đóng gói sử dụng các lớp và đối tượng chứa dữ liệu và code để ẩn các chi tiết bên trong của chương trình với người dùng. Điều này được thực hiện bằng cách tạo một lớp trừu tượng giữa người dùng và code nguồn phức tạp hơn, giúp bảo vệ thông tin nhạy cảm được lưu trữ trong code nguồn.

Tính trừu tượng

 - Giảm độ phức tạp và cải thiện khả năng đọc code

 - Tạo điều kiện tái sử dụng code và tổ chức

 - Ẩn dữ liệu cải thiện bảo mật dữ liệu bằng cách ẩn các chi tiết nhạy cảm với người dùng

 - Nâng cao năng suất bằng cách loại bỏ các chi tiết cấp thấp

```php
<?php
abstract class greet{
   abstract function hello($name, $age);
}

class person extends greet{
   function hello($name, $age){
      echo "My name is $name and my age is $age";
   }
}

$a = new person();
$a -> hello("Duc", 20);     //In ra "My name is Duc and my age is 20"
?>
```


### Polymorphism
Đa hình có nghĩa là thiết kế các đối tượng để **chia sẻ hành vi**. Bằng cách sử dụng tính kế thừa, các đối tượng có thể ghi đè các hành vi chung của cha mẹ bằng các hành vi con cụ thể. Tính đa hình cho phép cùng một phương thức thực hiện các hành vi khác nhau theo hai cách: ghi đè phương thức và nạp chồng phương thức.

```php
<?php
class Animal {
    var $name;

    function __construct($animalName) {
        $this->name = $animalName;
    }

    function move() {
        echo "<p>Animal parent class: All animals can move. " . $this->name . " is moving...<br>";
    }
}

class Dog extends Animal {
    function growl() {
        echo "Dog child class: A dog can growl but a duck can't. " . $this->name . " is growling...</p>";
    }

    function move() {
        echo "<p>Dog child class: Overriding the move() of the parent class. " . $this->name . " is walking...<br>";
    }
}

class Duck extends Animal {
    function quack() {
        echo "Duck child class: A duck can growl but a dog can't. " . $this->name . " is quacking...</p>";
    }

    function move() {
        echo "<p>Duck child class: Overriding the move() of the parent class. " . $this->name . " is waddling...<br>";
    }
}

$dog1 = new Dog("Fido");
$dog1->move();
$dog1->growl();

$duck1 = new Duck("Donald");
$duck1->move();
$duck1->quack();
?>
```