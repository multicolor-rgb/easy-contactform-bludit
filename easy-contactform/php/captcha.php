
<?php 

$random = rand(1000,4900);
$randomSh = sha1($random);

global $SITEURL;

;?>

<script>
if(document.querySelector('.easyContactForm')!==null){

    document.querySelector('.easyContactForm .submit').setAttribute('name','submit');
    document.querySelector('.easyContactForm .name').setAttribute('name','name');
    document.querySelector('.easyContactForm .tel').setAttribute('name','tel');
    document.querySelector('.easyContactForm .email').setAttribute('name','email');
    document.querySelector('.easyContactForm .message').setAttribute('name','message');




const captcha = `
<style>
@import url('https://fonts.googleapis.com/css2?family=Shizuru&family=Special+Elite&display=swap');
</style>

<div style="display: flex;
align-items: center;
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none; 
-moz-user-select: none;
-ms-user-select: none; 
user-select: none;
justify-content: center;border-radius:5px;margin-top:10px;overflow:hidden;text-align:center;width:130px;height:50px;font-size:2rem;font-family: 'Shizuru',
 cursive;background:url('<?php echo $this->domainPath().'img/bg.jpg';?>');">
<?php echo $random;?>
</div>

<input type="text" name="captcha" class="form-control" required style="width:130px;margin-top:20px;margin-bottom:20px;">

<input type='hidden' name='hiddencaptcha' style="display:none"  value='<?php echo $randomSh;?>'>


`;

document.querySelector('.easyContactForm .privacy-div').insertAdjacentHTML('afterend',captcha);
}
</script>