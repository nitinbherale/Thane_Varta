<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function cmt_error(){
        swal("comment sending failed.... Try again!");
    }
</script>
<?php 
if(isset($_POST['leave_comment'])){
    $heading = $_POST['heading'];
    $news_id = $_POST['news_id'];
    $name =  mysqli_real_escape_string($dblink,$_POST['name']);
    $email =  mysqli_real_escape_string($dblink,$_POST['email']);
    $comment =  mysqli_real_escape_string($dblink,$_POST['comment']);
    $c_date = date('Y-m-d');
      
    $cmn_qry ="insert into comments set news_id = $news_id, author =  '$name', email = '$email', content = '$comment', date = '$c_date'";
    $run_qry = mysqli_query($dblink,$cmn_qry);
    if($run_qry){
       echo '<script>
            swal({
            title: "Thanks for comment",
            text: "Comment sent successfully",
            type: "success"
        }).then(function() {
            window.location = "single_page_news/'.$news_id.'/'.$heading.'/";
        });
        </script>';
    }
    else{
        echo "<script>cmt_error()</script>";
    }
}
?>
<?php 
 $com_qry = "select * from comments where status = 1  and news_id = ".$newz_id." order by date desc";
    list($comments) = exc_qry($com_qry); ?>
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mb-30">
                <div class="news-details-layout1">
                    <div class="position-relative mb-30">
                        <img src="img/news/<?php echo $news_single[0]['img']; ?>" alt="news-details" class="img-fluid img img-responsive">
                        <div class="topic-box-top-sm">
                            <div class="topic-box-sm color-cinnabar mb-20"><?php echo get_cat_name($news_single[0]['category']) 
                                        ?></div>
                        </div>
                    </div>
                    <h2 class="title-semibold-dark size-c30"><?php echo $news_single[0]['heading']; ?></h2>
                    <ul class="post-info-dark mb-30">
                        <li>
                                <span>By</span> <?php echo $news_single[0]['author']; ?>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar" aria-hidden="true"></i><?php echo date("F d, Y", strtotime($news_single[0]['post_date'])); ?></a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-eye" aria-hidden="true"></i>202</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-comments" aria-hidden="true"></i><?php echo count($comments); ?></a>
                        </li>
                    </ul>
                    
                    <p>
                      <?php echo $news_single[0]['content']; ?>  
                    </p>
                   
                    <ul class="blog-tags item-inline">
                        <li>Tags</li>
                        <?php $str=$news_single[0]['tags'];; 
                        $list = array_map('trim',explode(",",$str));
                        $i = 0;
                        while($i<count($list)){
                        echo '<li> <a href="tags.php?t='.$list[$i].'">'.$list[$i].'</a></li>';
                        $i++;}?>
                        <!-- li>
                            <a href="#">#Business</a>
                        </li>
                        <li>
                            <a href="#">#Magazine</a>
                        </li>
                        <li>
                            <a href="#">#Lifestyle</a>
                        </li> -->
                    </ul>
                    <div class="post-share-area mb-40 item-shadow-1">
                        <p>You can share this post!</p>
                        <ul class="social-default item-inline">
                            <li>
                                <a href="#" class="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="google">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="pinterest">
                                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="rss">
                                    <i class="fa fa-rss" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row no-gutters divider blog-post-slider">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <a href="#" class="prev-article">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>Previous article</a>
                            <h3 class="title-medium-dark pr-50">Wonderful Outdoors Experience: Eagle Spotting in Alaska</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                            <a href="#" class="next-article">Next article
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                            <h3 class="title-medium-dark pl-50">The only thing that overcomes hard luck is hard work</h3>
                        </div>
                    </div>
                 <!--    <div class="author-info p-35-r mb-50 border-all">
                        <div class="media media-none-xs">
                            <img src="img/author.jpg" alt="author" class="img-fluid rounded-circle">
                            <div class="media-body pt-10 media-margin30">
                                <h3 class="size-lg mb-5">Mark Willy</h3>
                                <div class="post-by mb-5">By Admin</div>
                                <p class="mb-15">Dorem Ipsum is simply dummy text of the printing and typesetting industr been
                                    the industry's standard dummy text ever since.</p>
                                <ul class="author-social-style2 item-inline">
                                    <li>
                                        <a href="#" title="facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="google-plus">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="linkedin">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="pinterest">
                                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="comments-area">
                        
                        <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20"><?php echo count($comments); ?> Comments</h2>
                        <?php if(count($comments)>0){ ?>
                        <ul>
                            <?php for ($n=0; $n < count($comments); $n++) { ?>
                            <li>
                                <div class="media media-none-xs">
                                    <!-- <img src="img/blog1.jpg" class="img-fluid rounded-circle" alt="comments"> -->
                                    <div class="media-body comments-content media-margin30">
                                        <h3 class="title-semibold-dark">
                                            <a><?php echo $comments[$n]['author']; ?> ,
                                                <span><?php echo date(" F d, Y", strtotime($comments[$n]['date'])); ?></span>
                                            </a>
                                        </h3>
                                        <p><?php echo $comments[$n]['content']; ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    </div>
                    <div class="leave-comments">
                        <h2 class="title-semibold-dark size-xl mb-40">Leave Comments</h2>
                        <form id="leave-comments" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="hidden" name="heading" value="<?php echo $news_single[0]['heading'] ?>">
                                        <input type="hidden" name="news_id" value="<?php echo $news_single[0]['id'] ?>">
                                        <input placeholder="Name*" class="form-control" name="name" type="text" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Email*" class="form-control" type="email" name="email" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               <!--  <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Web Address" class="form-control" type="text">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea placeholder="Message*" class="textarea form-control" id="form-message" rows="8" cols="20" name="comment" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-none">
                                        <button type="submit" class="btn-ftg-ptp-45" name="leave_comment">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           <?php include("sidebar.php") ?>
        </div>
    </div>
</section>