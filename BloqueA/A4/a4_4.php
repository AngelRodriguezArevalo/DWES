<?php
    declare(strict_types=1);

    class Library
    {
        private array $books;
        private string $libraryName;

        // Constructor para inicializar las propiedades
        public function __construct(string $libraryName, array $books = [])
        {
            $this->libraryName = $libraryName;
            $this->books = $books;
        }

        // Método para añadir un libro
        public function addBook(string $title, string $author, int $year): void
        {
            $this->books[] = [
                'title' => $title,
                'author' => $author,
                'year' => $year
            ];
        }

        // Método para eliminar un libro por su título
        public function removeBook(string $title): bool
        {
            foreach ($this->books as $key => $book) {
                if ($book['title'] === $title) {
                    unset($this->books[$key]);
                    $this->books = array_values($this->books); // Reindexar el array
                    return true;
                }
            }
            return false;
        }

        // Método para obtener todos los libros
        public function getBooks(): array
        {
            return $this->books;
        }

        // Método para obtener el nombre de la biblioteca
        public function getLibraryName(): string
        {
            return $this->libraryName;
        }
    }

    // Instanciación y Manipulación del Objeto
    $library = new Library('Biblioteca Nacional', [
        ['title' => 'El señor de los anillos: La comunidad del anillo', 'author' => 'J.R.R. Tolkien', 'year' => 1954],
        ['title' => 'Harry Potter y la Priedra Filosofal', 'author' => 'J.K. Rowling', 'year' => 1997],
        ['title' => 'Saga Geralt de Rivia: La espada del destino', 'author' => 'Andrzej Sapkowski', 'year' => 1992],
    ]);

    // Añadir un nuevo libro
    $library->addBook('Harry Potter y la Cámara secreta', 'J.K. Rowling', 1998);

    // Eliminar un libro
    $library->removeBook('Harry Potter y la Priedra Filosofal');

    // Obtener la lista actualizada de libros
    $books = $library->getBooks();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliote nacional</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <h1><?= $library->getLibraryName() ?></h1>
        <h2>Listado de Libros</h2>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año de Publicación</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= htmlspecialchars($book['title']) ?></td>
                    <td><?= htmlspecialchars($book['author']) ?></td>
                    <td><?= htmlspecialchars((string)$book['year']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>