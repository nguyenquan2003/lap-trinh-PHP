<?php
class Category extends Db
{
    function all()
    {
        return $this->sqlSelect('select * from category');
    }
    function destroy($cat_id)
    {
        $dataTam = $this->sqlSelect('select book_id from book where cat_id=?', [$cat_id]);
        if (Count($dataTam) > 0) //co ma nay trong bang book
            return -1;//Khong xoa duoc, do rang buoc quan he
        return $this->sqlUpdate("delete from category where cat_id=?", [$cat_id]);//0-1
    }
    function store()//save vào database
    {
        $cat_id = $_POST['cat_id'] ?? '';
        $cat_name = $_POST['cat_name'] ?? '';
        //kiem tra primary key khong trung
        $dataTam = $this->sqlSelect('select * from category where cat_id=?', [$cat_id]);
        //print_r($dataTam);
        if (Count($dataTam) > 0) //co ma nay roi
            return -1;//trung khoa
        return $this->sqlUpdate("insert into category (cat_id, cat_name) values(?, ?)", [$cat_id, $cat_name]);
    }

    function edit($cat_id)
    {
        $dataTam = $this->sqlSelect('select book_id from book where cat_id=?', [$cat_id]);
        if (Count($dataTam) > 0) 
            return -1;
        return $this->sqlUpdate("update from category where cat_id=?", [$cat_id]);
    }
}