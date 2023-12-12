<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-6">
             <h2>Add New Post </h2>
            </div>
            <div class="col-md-6">
             <a href="<?php echo previous_url(); ?>" class="float-end btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
            </div>
        </div>
         <!-- /. ROW  -->
          <hr />
          <form id="add-post" method="post" action="insert_post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
                <div style="margin-bottom: 10px;">
                  <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Add Title" style="height: 50px;">
                </div>
              <textarea name="ckeditor1" style="height: 500px;"></textarea>
            </div>
            <div class="col-md-4">
              <div class="card">
                  <div class="card-header-c card-header">
                      Publish
                  </div>
                  <div class="card-body">
                    <div class="form-check">
                      <label class="form-label" style="font-weight: 100;">Visibility: </label>
                      <select class="form-select" name="visibility" id="visibility">
                        <option value="Private">Private</option>
                        <option value="Public" selected>Public</option>
                      </select>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-light float-end" id="submit" type="submit">Publish</button>
                  </div>
                </div>

                <div class="card" style="margin-top: 25px;">
                    <div class="card-header-c card-header">
                        Categories
                    </div>
                    <div class="card-body">
                      <div class="card" style="background: #f5f5f5;">
                        <div class="card-body">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="category0" value="Uncategorized">
                            <label class="form-check-label" for="category0" style="font-weight: 100;">
                              Uncategorized
                            </label>
                          </div>
                          <?php if($categories): ?>
                          <?php foreach($categories as $category): ?>
                          <div class="form-check" id="category_lists">
                            
                            <input class="form-check-input" type="radio" value="<?= $category['name'] ?>" name="category" id="category<?= $category['id'] ?>">
                            <label class="form-check-label" style="font-weight: 100;" for="category<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                      </div>
                      <a href="#category-add" id="add_category"><u>+Add New Category</u></a>
                    </div>
                  </div>

                  <div class="card" style="margin-top: 25px;">
                    <div class="card-header-c card-header">
                        Featured Image
                    </div>
                    <div class="card-body">
                      <div class="form-group col-md-6 mx-auto mt-3 text-center">
                        <div id="img-display">

                        </div>
                      <input type="hidden" name="user_id" value="<?= session()->user_id_admin; ?>">
                        <!-- Button trigger modal -->
                        <a id="ft-img-trigger" href="#set-img" data-bs-toggle="modal" data-bs-target="#uploadModal">
                          <u id="triger-txt">Set featured image</u>
                        </a>

      <!-- Modal -->
      <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-xl modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="uploadModalLabel">Featured Image</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">

                    <div class="tabset">
                      <!-- Tab 1 -->
                      <input type="radio" name="tabset" id="tab1" aria-controls="upload" checked>
                      <label for="tab1">Upload</label>
                      <!-- Tab 2 -->
                      <input type="radio" name="tabset" id="tab2" aria-controls="image-list">
                      <label for="tab2">Media Library</label>

                      <div class="tab-panels">
                        <section id="upload" class="tab-panel">
                          <div id="uploadDropzone" class="dz-clickable dropzone">
                             <div class="dz-message">Add file here</div>
                             <div id="imagePreview">

                             </div>
                          </div>
                        </section>
                        <section id="image-list" class="tab-panel" style="width: 100%;">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-12">
                                <div id="paginate_container">
                                    <?php if($images): ?>
                                    <?php foreach($images as $image): ?>
                                      <img src="/public/uploads/images/<?= $image['image_name']; ?>" name="<?= $image['image_name']; ?>" class="img_list" alt="" style="width: 200px; height: 200px; object-fit: cover; border: solid 1px grey;">
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="set_ft">Set featured image</button>
            </div>
          </div>
        </div>
      </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </form>
    </div>
     <!-- /. PAGE INNER  -->
  </div>
<!--  -->
