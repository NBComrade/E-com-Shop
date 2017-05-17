<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\Pjax;

$this->title = 'Contact';
?>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="container">
            <div class="alert alert-success">
                Thank you for contacting us. We will respond to you as soon as possible.
            </div>
        </div>
    <?php endif; ?>

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <?php $form = ActiveForm::begin(['id' => 'main-contact-form',
                                                        'options' => ['class' => 'contact-form row'
                                                        ]]); ?>
                        <div class="form-group col-md-6">
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->input('text', ['placeholder' => "Name"])->label(false); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <?= $form->field($model, 'email')->input('email', ['placeholder' => "Email"])->label(false); ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?= $form->field($model, 'subject')->input('text', ['placeholder' => "Subject"])->label(false); ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?= $form->field($model, 'body')->textarea(['id'=> 'message', 'rows' => '8', 'placeholder' =>'Your Message'])->label(false); ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                        <p>New York, USA</p>
                        <p>Mobile: <?= Yii::$app->params['adminPhone'];?></p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: <?= Yii::$app->params['adminEmail'];?></p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
