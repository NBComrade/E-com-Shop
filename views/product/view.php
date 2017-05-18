<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "$product->name | Eshopper";
?>
<section>
		<div class="container">
			<div class="row product-row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
                        <ul class="catalog">
                            <?=
                            \app\components\MenuWidget::widget(['tpl' => 'menu'])
                            ?>
                        </ul>
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->

						<div class="shipping text-center"><!--shipping-->
							<img src="/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                                <?= Html::img("@web/images/products/{$product->img}", ['alt' => $product->name])?>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
										</div>

									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
                                <h2><?= $product->name?></h2>
								<p>Web ID: 1089772</p>
								<span>
									<span>US $<?= $product->price?></span>
									<label>Quantity:</label>
									<input type="text" value="1" id="qty"/>
									<a href="#" data-id="<?=$product->id;?>" class="btn btn-fefault cart add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </a>
								</span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name?></a></p>
                                <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>

								<li ><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<?= $product->content;?>
							</div>
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<?php if(Yii::$app->session->hasFlash('success')): ?>
										<div class="product-comment">
											<p><?=Yii::$app->session->getFlash('success');?></p>
										</div>
									<?php endif;?>
									<?php foreach($comments as $item):?>
											<div class="product-comment">
												<ul>
													<li><a href=""><i class="fa fa-user"></i><?=$item->user->username;?></a></li>
													<li><a href=""><i class="fa fa-calendar-o"></i><?=$item->created_at;?></a></li>
												</ul>
												<p><?=$item->content;?></p>
											</div>
									<?php endforeach;?>
									<p>If you want leave the comment, <a href="<?=Url::toRoute('site/login')?>">login</a> please! </p>
									<?php if(!Yii::$app->user->isGuest):?>
									<p><b>Write Your Review</b></p>

									<?php $form = ActiveForm::begin()?>
										<?= $form->field($comment, 'content')->textarea(['rows'=>11])->label(false);?>
										<?= Html::submitButton('Submit', ['class' => 'btn btn-default pull-right'])?>
									<?php ActiveForm::end()?>
									<?php endif;?>
								</div>
							</div>

						</div>
					</div><!--/category-tab-->

                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $count = count($hits); $i = 0; foreach($hits as $hit): ?>
                                    <?php if($i % 3 == 0): ?>
                                        <div class="item <?php if($i == 0) echo 'active' ?>">
                                    <?php endif; ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?= Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name])?>
                                                    <h2>$<?= $hit->price?></h2>
                                                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>"><?= $hit->name?></a></p>
                                                    <button data-id="<?=$hit->id?>" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; if($i % 3 == 0 || $i == $count): ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>
