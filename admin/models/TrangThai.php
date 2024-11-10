<?php
class trangThai
{
    public $conn;
    // hàm kết nối csdl
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Danh sách danh mục
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM trang_thais';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }


    // lấy thông tin chi tiết
    public function getDetaiData($id)
    {
        try {
            $sql = 'SELECT * FROM trang_thais WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }

    // update
    public function UpdateData($id, $ten_trang_thai)
    {
        try {
            // Corrected SQL query
            $sql = 'UPDATE trang_thais 
                    SET ten_trang_thai = :ten_trang_thai
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            // var_dump($stmt);die();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_trang_thai', $ten_trang_thai);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }



    // xóa danh mục
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE  FROM trang_thais WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'lỗi' . $e->getMessage();
        }
    }






    // hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}
