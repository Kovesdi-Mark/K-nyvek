CREATE DATABASE book_library;

USE book_library;

CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    bio TEXT
);

CREATE TABLE publishers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    isbn VARCHAR(13) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    cover_url VARCHAR(255),
    author_id INT,
    publisher_id INT,
    category_id INT,
    FOREIGN KEY (author_id) REFERENCES authors(id),
    FOREIGN KEY (publisher_id) REFERENCES publishers(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Initial data from AI
INSERT INTO authors (name, bio) VALUES 
('J.K. Rowling', 'British author best known for the Harry Potter fantasy series, which has sold millions worldwide and been adapted into films.'),
('Stephen King', 'American author of horror, supernatural fiction, suspense, and fantasy novels, with over 60 books published.'),
('J.R.R. Tolkien', 'English writer and philologist famous for The Hobbit and The Lord of the Rings, pioneering high fantasy literature.'),
('George R.R. Martin', 'American novelist and screenwriter renowned for A Song of Ice and Fire series, adapted into Game of Thrones TV show.'),
('Agatha Christie', 'English writer known as the Queen of Crime, author of 66 detective novels featuring characters like Hercule Poirot.');

INSERT INTO publishers (name) VALUES 
('Penguin Random House'),
('HarperCollins'),
('Simon & Schuster'),
('Macmillan Publishers'),
('Hachette Livre');

INSERT INTO categories (name) VALUES 
('Fantasy'),
('Horror'),
('Mystery'),
('Science Fiction'),
('Adventure');

INSERT INTO books (title, isbn, price, description, cover_url, author_id, publisher_id, category_id) VALUES 
('Harry Potter and the Philosopher''s Stone', '9780747532699', 15.00, 'A young wizard discovers his magical heritage and attends Hogwarts School. Adventures ensue with friends and foes.', 'https://example.com/cover1.jpg', 1, 1, 1),
('It', '9780451169518', 20.00, 'A group of children confront a shape-shifting evil in their town. Years later, they reunite to defeat it.', 'https://example.com/cover2.jpg', 2, 2, 2),
('The Hobbit', '9780261102217', 12.00, 'Bilbo Baggins embarks on an unexpected journey with dwarves to reclaim their homeland.', 'https://example.com/cover3.jpg', 3, 3, 5),
('A Game of Thrones', '9780553103540', 18.00, 'Noble families vie for control of the Iron Throne in a land of intrigue and war.', 'https://example.com/cover4.jpg', 4, 4, 1),
('Murder on the Orient Express', '9780062073495', 10.00, 'Detective Hercule Poirot solves a murder aboard a luxurious train.', 'https://example.com/cover5.jpg', 5, 5, 3),
('The Shining', '9780385121675', 22.00, 'A family caretakes an isolated hotel where supernatural forces drive the father mad.', 'https://example.com/cover6.jpg', 2, 1, 2),
('The Fellowship of the Ring', '9780261103573', 25.00, 'Frodo Baggins sets out to destroy a powerful ring with a fellowship of allies.', 'https://example.com/cover7.jpg', 3, 2, 1),
('And Then There Were None', '9780062073488', 14.00, 'Ten strangers are invited to an island where they are killed one by one.', 'https://example.com/cover8.jpg', 5, 3, 3),
('A Clash of Kings', '9780553579901', 19.00, 'War rages across Westeros as kings clash for power.', 'https://example.com/cover9.jpg', 4, 4, 4),
('Carrie', '9780385086950', 16.00, 'A teenage girl with telekinetic powers seeks revenge on her tormentors.', 'https://example.com/cover10.jpg', 2, 5, 2);