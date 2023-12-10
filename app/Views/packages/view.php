<div class="row">
<div class="col-md-7 heading-section ftco-animate">
  </div>
<div class="left-column">
  <div class="card">
  <h1 class="blog-post-title"><?= $packages['title'] ?></h1>
  <h5>Date: <?= $packages['created'] ?></h5>
  <hr>
  <img src="/public/uploads/images/<?= $packages['package_img'] ?>" alt="<?= $packages['slug'] ?>" style="width: 100%; height: 50rem; object-fit: cover;"/>

    <p class="blog-post-text"><?= $packages['body'] ?></p>
    <hr>
              <h3>Leave a comment:</h3>
      <div class="contact-col">
        <form action="<?= site_url('package/acceptComment') ?>" method="post"  id="comment_form">
        <div id="rating-stars" style="margin-bottom: 10px;">
          <span class="star" data-rating="1"><i class="icon-star"></i></span>
          <span class="star" data-rating="2"><i class="icon-star" ></i></span>
          <span class="star" data-rating="3"><i class="icon-star"></i></span>
          <span class="star" data-rating="4"><i class="icon-star"></i></span>
          <span class="star" data-rating="5"><i class="icon-star"></i></span>
        </div>
          <input type="text" name="cmnt_name" placeholder="Enter your name" required>
          <input type="email" name="cmnt_email" placeholder="Enter email address" required>
          <textarea id="body" rows="8" name="cmnt" placeholder="message " required></textarea>
          <input type="hidden" name="package_id" value="<?= $packages['id']; ?>">
          <input type="hidden" name="package_title" value="<?= $packages['slug']; ?>">
          <input type="hidden" id="rating-input" name="rating" value="">
          <button type="button" class="btn cta-btn" id="comment_btn">Submit</button>
        </form>
      </div>
      <hr>
      <div class="comment-box">
        <h3>All comments:</h3>

        <?php if($comments): ?>
        <?php foreach($comments as $comment): ?>
        <?php if($comment['package_id'] == $packages['id']): ?>

        <div class="all-comment">
        <div class="info-comment">
        <p>Name: <?= $comment['name'] ?></p>
        <p>Email: <?= $comment['email'] ?></p>
      </div>
      <p> <?php
        $badWords = array("yawa", "piste", "fuck"); // List of bad words

        $commentBody = $comment['body']; // Assuming $comment['body'] contains the comment's body


        $words = explode(" ", $commentBody); // Split the comment's body into individual words
        foreach ($words as &$word) {
            if (in_array(strtolower($word), $badWords)) {
                // Replace bad word with a placeholder
                $word = "***";
            }
        }
        $filteredBody = implode(" ", $words); // Reconstruct the filtered comment body
        $comment['body'] = $filteredBody;

        echo "<p>" .  $comment['body'] . "</p>"; // Output the filtered comment body within <p> tags

        ?>
      </div>

      <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>

  </div>
  </div>

</div>

<div class="right-column">
  <div class="card">
     
      <a class="btn cta-btn" href="/">Home</a>
  </div>
  <div class="card">
      <h3>Related Post</h3>

      <?php if($related): ?>
      <?php foreach($related as $relatePost): ?>

      <div class="campus-col">
      <img src="/public/uploads/images/<?= $relatePost['package_img'] ?>" style="height: 200px; width: 300px; object-fit: cover;"/>
      <div class="layer">
              <h3><a href="<?= site_url("package/") ?><?= esc($relatePost['slug'], 'url'); ?>"><?= $relatePost['title'] ?></a></h3>
          </div>
    </div>

  <?php endforeach; ?>
  <?php endif; ?>

    </div>
  <div class="card">
    <h3>BOOK NOW!</h3>
    <p>Click here get started</p>
      <a class="btn cta-btn" href="/#destination">Home</a>
  </div>
    <div class="card">
    <h3>Other Packages</h3>
    <hr>
    <div class="package">
    <p>Kayaking</p>
    <p>Island Hoping</p>
    <p>Snorkeling</p>
    <p>Banana Boating</p>
    </div>
  </div>
  <div class="card">
    <h3>Our Foods</h3>
    <hr>
    <div class="package">
      <p>Lechon Manok</p>
      <p>Liempo</p>
      <p>Unli Puso</p>
      <p>Soft Drinks</p>
      </div>

  </div>

</div>
</div>
