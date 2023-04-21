<?php

// membuat jembatan untuk business logic aplikasi ke semua perintah sql di database
namespace Repository {

    use Model\Admin;
    use PDO;

    // membuat interface untuk semua perintah sql
    interface RepositoryAdmin
    {
        public function insert(Admin $admin): Admin;
        public function findById(int $id): ?Admin;
        public function findAll(): array;
    }

    class RepositoryAdminImpl implements RepositoryAdmin
    {
        // buat koneksi ke database
        public function __construct(private PDO $connection)
        {
        }

        public function insert(Admin $admin): Admin
        {
            // membuat kode sql insert
            $sql = "INSERT INTO admin(first_name, last_name) VALUES(?,?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$admin->getFirst_name(), $admin->getLast_name()]);

            // cek jika ada id baru yang tergenerate
            $admin->setId((int)$this->connection->lastInsertId());

            // return kan
            return $admin;
        }

        public function findById(int $id): ?Admin
        {
            // membuat kode sql find
            $sql = "SELECT * FROM admin WHERE id=?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);

            // cek apakah ada id di database
            if ($row = $statement->fetch()) {
                // kembalikan object admin
                return new Admin(
                    id: $row["id"],
                    first_name: $row["first_name"],
                    last_name: $row["last_name"]
                );
            } else {
                return null;
            }
        }

        public function findAll(): array
        {

            // membuat kode sql select 
            $sql = "SELECT * FROM admin";
            $statement = $this->connection->query($sql);
            $statement->execute();

            // cek semua data di database 
            $array = []; // array untuk menampung data
            while ($row = $statement->fetch()) {
                // masukan object ke dalam array
                $array[] = new Admin(
                    id: $row["id"],
                    first_name: $row["first_name"],
                    last_name: $row["last_name"]
                );
            }

            // kembalikan array
            return $array;
        }
    }
}
