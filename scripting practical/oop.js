// Define a class called Person
class Person {
    // Constructor to initialize object properties
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }

    // Method to greet
    greet() {
        console.log(`Hello, my name is ${this.name} and I'm ${this.age} years old.`);
    }
}

// Create instances of the Person class
const person1 = new Person("Alice", 30);
const person2 = new Person("Bob", 25);

// Call the greet method on each instance
person1.greet(); // Output: Hello, my name is Alice and I'm 30 years old.
person2.greet(); // Output: Hello, my name is Bob and I'm 25 years old.
