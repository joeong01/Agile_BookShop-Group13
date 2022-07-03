@extends('adminFrame')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .filter{
            width: 270px;
            margin-left: 1%;
            margin-right: 1%;
            margin-bottom: 2%;
            float: left;
        }

        .content{
            width: 79%;
            margin-top: 1%;
            margin-bottom: 1%;
            float: left;
        }

        #page-container{
            position: relative;
            min-height: 100vh;
        }

        table{
            width: 100%;
            border: 2px solid;        
        }

        td{
            font-size: 17px;
            padding-top: 1px;
            border: 2px solid;
        }

        th{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            text-align: center;
            border: 2px solid;
        }
    </style>

</head>
<body style="background-color: rgb(173, 173, 173);" > 
<div class="float-container">
    <div class="filter">
        <form action="" method="GET">
            <div class="card shadow mt-3">
                <div class="card-header">
                    <h5>filter and Sort 
                        <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                    </h5>
                </div>
                <div class="card-body">
                    <h6>Category List</h6>
                    <hr>
                    <?php
                    $con = mysqli_connect("localhost","root","","bookstore");

                    $book = "SELECT * FROM category";
                    $book_run  = mysqli_query($con, $book);

                    foreach($book_run as $booklist)
                    {
                        $checked = [];
                        if(isset($_GET['categories']))
                        {
                            $checked = $_GET['categories'];
                        }
                        ?>
                            <div>
                                <input type="checkbox" name="categories[]" value="<?= $booklist['categoryID']; ?>"
                                    <?php if(in_array($booklist['categoryID'], $checked)){ echo "checked"; } ?>
                                    />
                                <?= $booklist['categoryName']; ?>
                            </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <h6>Sorting</h6>
                    <hr>
                    <h6>ISBN</h6>
                    <input type="radio" name="type" value="book.ISBN_13 ASC"
                        <?php if (!empty($_GET['type']) && $_GET['type'] == "book.ISBN_13 ASC"){ echo "checked"; }?>
                    > Ascending
                    <input type="radio" name="type" 
                        <?php if (!empty($_GET['type']) && $_GET['type'] == "book.ISBN_13 DESC"){ echo "checked"; }?>
                    value="book.ISBN_13 DESC"> Descending 
                    <br><br>
                    
                    <h6>Book Name</h6>
                    <input type="radio" name="type"
                        <?php if (!empty($_GET['type']) && $_GET['type'] == "book.bookName ASC"){ echo "checked"; }?>
                     value="book.bookName ASC"> Ascending
                    <input type="radio" name="type" 
                        <?php if (!empty($_GET['type']) && $_GET['type'] == "book.bookName DESC"){ echo "checked"; }?>
                    value="book.bookName DESC"> Descending 
                    <br><br>

                    <h6>Stock Level</h6>
                    <input type="radio" name="type" value="stock.stockLevel ASC" 
                        <?php if (!empty($_GET['type']) && $_GET['type'] == "stock.stockLevel ASC"){ echo "checked"; }?>
                    > Ascending
                    <input type="radio" name="type" 
                        <?php if (!empty($_GET['type']) && $_GET['type'] == "stock.stockLevel DESC"){ echo "checked"; }?>
                    value="stock.stockLevel DESC"> Descending 

                    <br><br>
                    <h6>Category</h6>
                    <input type="radio" name="category" value="category.categoryName ASC"> Ascending
                        <?php if (!empty($_GET['type']) && $_GET['type'] == "category.categoryName ASC"){ echo "checked"; }?>
                    <input type="radio" name="category" 
                        <?php if (!empty($_GET['type']) && $_GET['type'] == "category.categoryName DESC"){ echo "checked"; }?>
                    value="category.categoryName DESC"> Descending 
                </div>
            </div>
        </form>
    </div>
    <!-- categories Items - Products -->
    <?php
    if(isset($_GET['categories']))
    {?>
    <div class="content">
        <div class="card">
            <form action="" method="GET">
            <?php
                $categorychecked = [];
                $categorychecked = $_GET['categories'];

                ?>
                <table>
                    <tr>
                        <th>ISBN_13</th>
                        <th>Book Name</th>
                        <th>Category</th>
                        <th>Stock Level</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                <?php
                foreach($categorychecked as $rowcategory)
                {
                    $products = "SELECT book.ISBN_13, book.bookName, stock.stockLevel, category.categoryName FROM book JOIN stock ON book.ISBN_13 = stock.ISBN_13 JOIN category ON book.bookCategory = category.categoryID Where book.bookCategory IN (\"$rowcategory\") ORDER By ".$_GET['type']." ";

                    $products_run = mysqli_query($con, $products);
                    if(mysqli_num_rows($products_run) > 0)
                    {
                            foreach($products_run as $proditems){
                                ?>
                                <tr>
                                    <th>{{ $proditems['ISBN_13']; }}</th>
                                    <th>{{ $proditems['bookName'] }}</th>
                                    <th>{{ $proditems['categoryName'] }}</th>
                                    <th>{{ $proditems['stockLevel'] }}</th>
                                    <td><a href="http://127.0.0.1:8000/edit_book?id={{ $proditems['ISBN_13'] }}"><img src="{{ url('/Picture/edit.png') }}" width="50px" height="50px"></a></td>
                                    <td><a href="http://127.0.0.1:8000/delete_book?id={{ $proditems['ISBN_13'] }}"><img src="{{ url('/Picture/delete.png') }}" width="50px" height="50px"></a><td>
                                </tr>
                                <?php
                            }
                    }
                }
                ?>
                </table>
            </form>
        </div>
    </div>
    <?php }?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>

@endsection 