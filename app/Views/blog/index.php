
</div>
<br>
<br>
<br>
<br>

<section class="ftco-section ftco-degree-bg section-body" id="rate">
  <div class="container">
    <div class="row">
      <div class="col-md-7 heading-section ftco-animate">
        <h2 class="mb-4"><strong>Blogs</strong> & Feedback</h2>
        </div>
        <div class="col-md-7 heading-section ftco-animate">

          <?php if($posts): ?>
          <?php foreach($posts as $post): ?>

          <div class="blog-post">
            <div class="blog-post-img">
              <img src="public/uploads/images/<?= $post['post_image'] ?>" alt="">
              </div>
                <div class="blog-post-info">
                  <div class="blog-post-faggot">
                      <h1 class="blog-post-title"><?= $post['title'] ?></h1>
                      <hr>
                </div>
              <small><?php $db = $post['created_at']; $timestamp = strtotime($db); echo date("F j, Y", $timestamp); ?></small>
              <p class="blog-post-text"><?= word_limiter($post['body'],50) ?> <a href="/blog/<?= esc($post['slug'], 'url'); ?>">Read More</a></p>
              <br>
              <hr>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <p>Follow Us:</p>
                <li class="ftco-animate"><a href="https://www.facebook.com/"><span
                      class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="https://www.instagram.com/"><span
                        class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>

          <div class="pagination mt-4">
            <?php if (!empty($pager)) :
              echo $pager->links('blogs', 'myPager');
            endif ?>
          </div>
<br>
<br>
          <h3 class="blog-post-title">Comments:</h3>
          <label for="subject">Name: Dave Oporto</label>
            <textarea id="subject" name="subject"	placeholder="WOW!"  disabled></textarea>
<hr>
          <h3>Add Comments:</h3>

        <div class="vox">
          <form action="/action_page.php">
            <label for="fname">Name:</label>
            <input class="haha" style="border-radius: 50px;" type="text" id="fname" name="firstname"
              placeholder="Your name.." required>

            <label for="lname">Email:</label>
            <input class="haha" style="border-radius: 50px;" type="text" id="lname" name="lastname"
              placeholder="Your last name.." required>

            <label for="subject">Comment:</label>
            <textarea id="subject" style="border-radius: 50px;" name="subject"
              placeholder="Write something.." style="height:200px" required></textarea>

              <a class="blog-post-clever">Submit</a>
          </form>
        </div>

      </div>
  </div>
</div>
</section>
<br>
