


<script>
    document.querySelector('#jseditorToolbarRight.btn-group').insertAdjacentHTML('afterbegin','<button class="btn btn-light ecf-add ">show/hide form settings</button>')

    const ecfAdd = document.querySelector('.ecf-add');
 
    const ecfModal = document.querySelector('.ecfmodal');
 
    const ecfSettings = document.createElement('div');
ecfSettings.classList.add('ecf-settings','my-2','d-none' );
    
ecfSettings.innerHTML = `
<div class="col-md-12 border p-3" style="display:grid;grid-template-columns:1fr 1fr;gap:10px;border-bottom:solid 4px #0078D4 !important;">

<div>
<p>Label for Name and Surname</p>
<input type="text" class="form-control ecfname"  >
<div class="d-flex border bg-light my-2 p-2">
<input type="checkbox" class="form-check mr-2 namereq">Required? 
</div>
</div>


<div>
<p>Label for Phone</p>
<input type="text" class="form-control ecfphone">
<div class="d-flex border bg-light my-2 p-2">
<input type="checkbox" class="form-check mr-2 phonereq">Required? 
</div>
</div>
 

<div>
<p>Label for E-mail</p>
<input type="text" class="form-control ecfmail" >
<div class="d-flex border bg-light my-2 p-2">
<input type="checkbox" class="form-check mr-2 emailreq">Required? 
</div>
</div>


<div class="">
<p>Label for Message</p>
 
<input type="text" class="form-control ecfcontent">
<div class="d-flex border bg-light my-2 p-2">
<input type="checkbox" class="form-check mr-2 contentreq">Required? 
</div>
</div>



 




<div style="grid-column:1/3">
<p>The content of the Privacy Policy</p>
<input type="text" class="form-control ecfprivacy" name="">
<div class="d-flex border bg-light my-2 p-2">
<input type="checkbox" class="form-check mr-2 privacyreq">Required? 
</div>
</div>


<div style="grid-column:1/3" class="bg-light border p-2">
<div>
<p>Text for the "Required" field</p>
<input type="text" class="form-control ecfreqtext" name="">
</div>
<br>
<div>
<p>Text for the "Submit" button</p>
<input type="text" class="form-control ecfsubmitbtn"  name="">
</div>
</div>



<div class="d-flex align-items-center justify-content-between border bg-light p-2  mb-3" style="grid-column:1/3">
 
<p class="m-0 p-0">Color submit button</p>
<input type="color" class="form-control form-control-color ecfbtn"  style="width:10%;" >
 
</div>

<div>

<button class="btn btn-primary ecfadd">
Add Contact Form
</button>

<button class="btn btn-danger ecfclose">
Close Settings
</button>

</div>


</div>

`;


function reqCheck(x,y='required'){

if(document.querySelector(x).checked){
return y;
}

}

 



document.querySelector('#jstitle').insertAdjacentElement('afterend',ecfSettings)


    
ecfAdd.addEventListener('click',(e)=>{
e.preventDefault();
ecfSettings.classList.toggle('d-none' );
})

    
 

//req

function reqValue(x,y=document.querySelector('.ecfreqtext').value){

if(reqCheck(x)=='required'){
return y;
}else{
return y='';
}
}







const ecfadd=document.querySelector('.ecfadd');
ecfadd.addEventListener('click',(e)=>{
e.preventDefault();


const formFormula = `<div class="cke-outer"><form class="easyContactForm" role="form" method="post" action="#" accept-charset="UTF-8"> 
        <label for="name" class="nameblank " style="margin-top:.5rem">${document.querySelector('.ecfname').value} <b>${reqValue('.namereq')}</b></label> 
        <input type="text" style=" box-sizing:border-box;width: 100%;border-radius: 5px;padding:10px; border:solid 1px rgba(0,0,0,0.3);" 
        class="form-control namecf" id="name" name="name" placeholder="" ${reqCheck('.namereq')} >

         <label for="tel" style="margin-top:.5rem">${document.querySelector('.ecfphone').value} <b>${reqValue('.phonereq')}</b></label> 
         
         <input type="tel" style="width: 100%;box-sizing:border-box;border-radius: 5px;padding:10px; border:solid 1px rgba(0,0,0,0.3);" 
         class="form-control" id="tel" name="tel"  ${reqCheck('.phonereq')}> 
         
         
         <label for="mail" style="margin-top:.5rem" >${document.querySelector('.ecfmail').value} <b>${reqValue('.emailreq')}</b></label>
         <input type="email" style="width: 100%;box-sizing:border-box;border-radius: 5px;padding:10px; border:solid 1px rgba(0,0,0,0.3);"
           class="form-control" id="email" name="email" ${reqCheck('.emailreq')}>
         
         
           <label for="message" style="margin-top:.5rem">${document.querySelector('.ecfcontent').value} <b>${reqValue('.contentreq')}</b></label>
           
           <textarea class="form-control"  
           style="width: 100%;box-sizing:border-box;border-radius: 5px; ;padding:10px; border:solid 1px rgba(0,0,0,0.3);" rows="3"
            placeholder="" name="message" id="message" ${reqCheck('.contentreq')} > 
            </textarea>

           
            <div style="width:100%;font-size:13px;" class="privacy-div">
            <input type="checkbox" value="zgoda" id="privacy" style="width:20px;margin:10px auto;float:left;" ${reqCheck('.privacyreq')}
        > <p style="margin-top: 20px;
padding-top: 3px;">${document.querySelector('.ecfprivacy').value} <b>${reqValue('.privacyreq')}</b></p>
            </div>

  

              <input id="submit" name="submit" type="submit"  style="    padding:10px 25px;
             background:${document.querySelector('.ecfbtn').value};
              color:#fff;border:0;
              padding:5px 15px;
              border-radius:5px;border-radius: 5px;
              padding: 10px 25px;width: auto;
              transition:all 250ms linear;"
              value="${document.querySelector('.ecfsubmitbtn').value}">
        </form></div>`;



tinymce.activeEditor.execCommand('mceInsertContent', false, formFormula);
 
ecfSettings.classList.toggle('d-none' );
})









  document.querySelector('.ecfclose').addEventListener('click',(e)=>{
      e.preventDefault();
    document.querySelector('.ecf-settings').classList.add('d-none');

  });






</script>





