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
           <input type="text" name="cmnt_name" placeholder="Enter your name" required>
           <input type="email" name="cmnt_email" placeholder="Enter email address" required>
           <textarea id="body" rows="8" name="cmnt" placeholder="message " required></textarea>
           <input type="hidden" name="package_id" value="<?= $packages['id']; ?>">
           <input type="hidden" name="package_title" value="<?= $packages['slug']; ?>">
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
         <p><?= $comment['body'] ?></p>
       </div>
      <?php endif; ?>
     <?php endforeach; ?>
     <?php endif; ?>
   </div>
   </div>

 </div>

 <div class="right-column">
   <div class="card">
      <!-- <h2>About Canyoneering</h2>
      <p>Canyoning is travelling in canyons using a variety of techniques that may include other outdoor activities such as walking, scrambling, climbing, jumping, abseiling, and swimming.</p><p style="font-weight: bold;"> Click home to get started</p> -->
       <a class="btn cta-btn" href="">Home</a>
   </div>
   <div class="card">
      <h3>Related Post</h3>
      <?php if($related): ?>
      <?php foreach($related as $relatePost): ?>
       <div class="campus-col">
      <img src="/public/uploads/images/<?= $relatePost['package_img'] ?>" style="height: 200px; width: 300px; object-fit: cover;"/>
       <div class="layer">
               <h3><a href="/blog/<?= esc($relatePost['slug'], 'url'); ?>"><?= $relatePost['title'] ?></a></h3>
           </div>
     </div>
   <?php endforeach; ?>
   <?php endif; ?>

     </div>
   <div class="card">
     <h3>BOOK NOW!</h3>
     <p>Click here get started</p>
      <a class="btn cta-btn" href="">Home</a>
   </div>
    <div class="card">
     <h3>Other Packages</h3>
     <hr>
     <div class="package">
     <p>City tour</p>
     <p>Island Hoping</p>
     <p>Osmena Peak</p>
     <p>Whale Shark</p>
    </div>
   </div>
   <div class="card">
     <h3>Our Foods</h3>
     <hr>
     <div class="package">
       <p>Lechon Manok</p>
       <p>Liempo</p>
       <p>Unli Rice</p>
       <p>Unli Drinks</p>
      </div>

   </div>

 </div>
</div>
