<?php

class Database
{
    private string $host = "localhost";
    private string $dbname = "studi_kasus_ecommers";
    private string $username = "root";
    private string $password = "";
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die("Koneksi error : " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Error : " . $e->getMessage());
        }
    }

    public function insert($data)
    {

        $category = htmlspecialchars($data["category"]);
        $harga = htmlspecialchars($data["harga"]);
        $gambar = $this->upload();
        if (!$gambar) {
            return false;
        }

        $sql = "INSERT INTO restoran(category, harga, gambar) VALUES(?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $category);
        $stmt->bindParam(2, $harga);
        $stmt->bindParam(3, $gambar);
        return $stmt->execute();
    }

    public function update($data)
    {
        $id = htmlspecialchars($data["id"]);
        $category = htmlspecialchars($data["category"]);
        $harga = htmlspecialchars($data["harga"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = $this->upload();
        }

        $sql = "UPDATE restoran SET category = ?, harga = ?, gambar = ? WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(1, $category);
        $stmt->bindParam(2, $harga);
        $stmt->bindParam(3, $gambar);
        $stmt->bindParam(4, $id);
        return $stmt->execute();
    }

    public function upload()
    {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if ($error === 4) {
            echo "<script>
        alert('pilih gambar terlebih dahulu');
        </script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
        alert('bukan gambar');
        </script>";
            return false;
        }

        if ($ukuranFile > 1000000000000) {
            echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM restoran WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function register($data)
    {
        $username = strtolower(htmlspecialchars($data["username"]));
        $email = strtolower(htmlspecialchars($data["email"]));
        $telp = strtolower(htmlspecialchars($data["telp"]));
        $password = stripslashes(htmlspecialchars($data["password"]));
        $password2 = stripslashes(htmlspecialchars($data["password2"]));

        // jika password nya tidak sama
        if ($password !== $password2) {
            echo "<script>
            alert('Password tidak sama!');
            </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // usernam dan password masuk ke database, password akan di acak karna di enkripsi terlebih dahulu
        $sql = "INSERT INTO user(username, email, telp, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $telp);
        $stmt->bindParam(4, $password);
        $result = $stmt->execute();
        return $result;
    }
}
