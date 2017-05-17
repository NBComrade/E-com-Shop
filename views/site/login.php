<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($loginModel, 'username')->textInput(['autofocus' => true])->input('text', ['placeholder' => "Your Username"])->label(false); ?>
                    <?= $form->field($loginModel, 'password')->passwordInput()->input('password', ['placeholder' => "Your Password"])->label(false); ?>
							<span>
								<?= $form->field($loginModel, 'rememberMe')->checkbox(); ?>
							</span>
                        <?= Html::submitButton('Login', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
                    <?php ActiveForm::end(); ?>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <?php $form = ActiveForm::begin(); ?>
                        <?= $form->field($signupModel, 'username')->textInput(['autofocus' => true])->input('text', ['placeholder' => "Name"])->label(false); ?>
                        <?= $form->field($signupModel, 'email')->textInput(['autofocus' => true])->input('email', ['placeholder' => "Email Address"])->label(false); ?>
                    <?= $form->field($signupModel, 'password')->passwordInput()->input('password', ['placeholder' => "Password"])->label(false); ?>
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-default', 'name' => 'signup-button']) ?>
                    <?php ActiveForm::end(); ?>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->