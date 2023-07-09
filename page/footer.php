<footer style="text-align: center;font-family: sans-serif; color: white; background-color:grey;" class="py-2  fixed-bottom">
©&nbsp<span id="year"></span>&nbsp Designed and Developed By <a style="text-decoration:none;color: white" href="mailto:chowdhuryakash950@gmail.com">Akash Chowdhury</a>.

</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="<?=$action->helper->loadjs(main.js)?>"></script>

<script>
 


const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
    <?php

    $error=$action->session->get('error');
    $success=$action->session->get('success');
  if($error){
        ?>
        

Toast.fire({
  icon: 'error',
  title: '<?=$error?>'
});
        <?php
        $action->session->delete('error');
    }

  if($success){
        ?>

Toast.fire({
  icon: 'success',
  title: '<?=$success?>'
});
        <?php
        $action->session->delete('success');
    }

    ?>

    $("#addskill").click(function(){
      var skill=$('#userSkill').val();
      if(!skill){
        Toast.fire({
        icon: 'error',
        title: 'Enter a Skill'
}); retuen;
      }
      $("#skills").append(`<span class="badge p-2 m-2 bg-danger badge-success" style="color:white;">${skill} <input type='hidden' name='skill[]' value='${skill}'><span id="removeskill" onClick="removeskill(this)">  <i class="bi bi-x-lg"></i></span></span>`)
      var skill=$('#userSkill').val('');
    })
    function removeskill(t){
      $(t).parent().remove();
    }


    //  education

    $("#addEducatoion").click(function(){
      var college=$('#college').val();
      var course=$('#course').val();
      var e_duration=$('#e_duration').val();

      if(!college){
        Toast.fire({
        icon: 'error',
        title: 'Enter Institute Name'
}); retuen;

      }
      if(!course){
        Toast.fire({
        icon: 'error',
        title: 'Enter Course'
}); retuen;

      }
      if(!e_duration){
        Toast.fire({
        icon: 'error',
        title: 'Enter Course Duration'
}); retuen;

      }
      $("#educations").append(` <div class="my-2 p-3 w-50" id="education">
      <input type='hidden' name='college[]' value='${college}'>
      <input type='hidden' name='course[]' value='${course}'>
      <input type='hidden' name='e_duration[]' value='${e_duration}'>
        <h4>${college}</h4>
        <p>${course} - (${e_duration})</p>
        <button class="btn btn-sm btn-danger"  id="" type="button" onClick="removeeducation(this)">Remove</button>
      </div>`)
      var college=$('#college').val('');
      var course=$('#course').val('');
      var e_duration=$('#e_duration').val('');

    });
    function removeeducation(t){
      $(t).parent().remove();
    }

// experience

$("#addexp").click(function(){
      var company=$('#company').val();
      var jobrule=$('#jobrule').val();
      var c_duration=$('#c_duration').val();
      var work_desc=$('#work_desc').val();

      if(!company){
        Toast.fire({
        icon: 'error',
        title: 'Enter Company Name'
}); retuen;

      }
      if(!jobrule){
        Toast.fire({
        icon: 'error',
        title: 'Enter Jobrule'
}); retuen;

      }
      if(!c_duration){
        Toast.fire({
        icon: 'error',
        title: 'Enter Work Duration'
}); retuen;

      }
      if(!work_desc){
        Toast.fire({
        icon: 'error',
        title: 'Enter Work Description'
}); retuen;

      }
      $("#exps").append(` <div class="my-2 p-3 w-50" id="education">
      <input type='hidden' name='company[]' value='${company}'>
      <input type='hidden' name='jobrule[]' value='${jobrule}'>
      <input type='hidden' name='c_duration[]' value='${c_duration}'>
      <textarea class="d-none" name='work_desc[]'>${work_desc}</textarea>
        <h4>${company}</h4>
        <p>${jobrule} - (${c_duration})</p>
        <p>${work_desc}</p>
        <button class="btn btn-sm btn-danger"  id="" type="button" onClick="removeexp(this)">Remove</button>
      </div>`)
      var company=$('#company').val('');
      var jobrule=$('#jobrule').val('');
      var c_duration=$('#c_duration').val('');
      var work_desc=$('#work_desc').val('');

    });
    function removeexp(t){
      $(t).parent().remove();
    }


function copyurl(url){
  navigator.clipboard.writeText(url);
  Toast.fire({
        icon: 'success',
        title: 'Share Link Copied'
});
}
    

document.getElementById("year").innerHTML = new Date().getFullYear();


</script>
</body>
</html>