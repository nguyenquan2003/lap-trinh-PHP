<?php 
class Book extends DB{
    function tatca()
    {
        return $this->selectQuery('select * from book');
    }
    function timkiemTheoTen($tensach)
    {
        return $this->selectQuery("select * from book where book_name like '%$tensach%' ");
    }
    function xoa($masach){
        return $this->updateQuery("delete from book where book_id='$masach' ");
    }
}