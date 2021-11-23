<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Sản phẩm </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="mb-3">
          <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#book-option1">
            Theo thể loại
          </button>
          <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#book-option2">
            Theo tác giả
          </button>
          <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#book-option3">
            Theo từ khóa
          </button>
          <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#book-option4">
            Theo năm xuất bản
          </button>
        </div>
        <div class="mb-3" id="bookGroup">
          <form action="">
          <div class="collapse <?= isset($_GET["book-category"]) ? "show" : "" ?>" id="book-option1" data-parent="#bookGroup">
            <div class="form-inline">
              <select name="book-category" class="form-control mr-2">
                <option value="-1">Chọn thể loại</option>
                <?php foreach ($categories as $category) { ?>
                  <option <?= isset($_GET["author-category"]) && $_GET["author-category"] == $category->category ? "selected" : "" ?> value="<?= $category->category ?> value="<?= $category->category ?>"><?= $category->category ?></option>
                <?php } ?>
              </select>
              <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
          <form action="">
          <div class="collapse <?= isset($_GET["book-author"]) ? "show" : "" ?>" id="book-option2" data-parent="#bookGroup">
            <div class="form-inline">
              <select name="book-author" class="form-control mr-2">
                <option value="-1">Chọn tác giả</option>
              </select>
              <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
          <form action="">
          <div class="collapse <?= isset($_GET["book-keyword"]) ? "show" : "" ?>" id="book-option3" data-parent="#bookGroup">
            <div class="form-inline">
              <input value="<?= isset($_GET["book-keyword"]) ? $_GET["book-keyword"] : "" ?>" type="text" class="form-control mr-2" name="book-keyword" placeholder="Tìm kiếm theo từ khóa">
              <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
          <form action="">
          <div class="collapse <?= isset($_GET["book-publishedyear"]) ? "show" : "" ?>" id="book-option4" data-parent="#bookGroup">
            <div class="form-inline">
              <input value="<?= isset($_GET["book-publishedyear"]) ? $_GET["book-publishedyear"] : "" ?>" type="number" class="form-control mr-2" name="book-publishedyear" placeholder="Tìm kiếm năm xuất bản">
              <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
        </div>
        <div class="row">
        <?php foreach ($books_list as $book) { ?>
          <div class="col-lg-3">
            <div class="card card-danger card-outline">
              <div class="card-body">
                <h5 class="card-title mb-2 text-bold"><?= $book->bookname ?></h5>

                <p class="card-text">
                  <strong>ISBN:</strong> <?= $book->isbn ?> <br>
                  <strong>Category:</strong> <?= $book->category ?> <br>
                  <strong>Author:</strong> <?= $book->author_name ?> <br>
                  <strong>Release date: </strong> <?= $book->date_release ?>
                </p>
                <div class="d-flex">
                  <button class="btn btn-sm btn-primary mr-2"><i class="fa fa-minus"></i></button>
                  <input type="number" class="form-control form-control-sm mr-2" value="0">
                  <button class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i></button>
                  <button class="btn btn-sm btn-primary mr-2"><i class="fa fa-shopping-cart"></i></button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Tác giả </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="mb-3">
          <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#author-option1">
            Theo thể loại
          </button>
          <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#author-option3">
            Theo từ khóa
          </button>
        </div>
        <div class="mb-3" id="authorGroup">
          <form action="">
          <div class="collapse <?= isset($_GET["author-category"]) ? "show" : "" ?>" id="author-option1" data-parent="#authorGroup">
            <div class="form-inline">
              <select name="author-category" class="form-control mr-2">
                <option value="-1">Chọn thể loại</option>
                <?php foreach ($categories as $category) { ?>
                  <option <?= isset($_GET["author-category"]) && $_GET["author-category"] == $category->category ? "selected" : "" ?> value="<?= $category->category ?>"><?= $category->category ?></option>
                <?php } ?>
              </select>
              <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
          <form action="">
          <div class="collapse <?= isset($_GET["author-keyword"]) ? "show" : "" ?>" id="author-option3" data-parent="#authorGroup">
            <div class="form-inline">
              <input type="text" value="<?= isset($_GET["author-keyword"]) ? $_GET["author-keyword"] : "" ?>" name="author-keyword" class="form-control mr-2" placeholder="Tìm kiếm theo từ khóa">
              <button class="btn btn-secondary"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
        </div>
        <div class="row">
        <?php foreach ($authors_list as $author) { ?>
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-2 text-bold"><?= $author->author_name ?></h5>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->