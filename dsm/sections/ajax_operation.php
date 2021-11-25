<script>
  $(document).ready(function(){
    $(".deleteBtn, .archiveBtn").click(function() {
      const name = (this.name);
      const class_id = $(this).attr('data-class');
      const subject_id = $(this).attr('data-subject');
      const admin_id = $(this).attr('data-admin');
      const id = (this.value); // or alert($(this).attr('id'));
      console.log(name)
      console.log(id)
      switch (name) {
          case 'deleteSubject':
          console.log('subject',id)
          $.ajax({
            url: 'http://localhost:5000/subjects/'+id,
            type: 'DELETE',
            success: function (result) {
              alert(result);
              window.location.href='subject_info.php?classID='+class_id+'&loggedID='+admin_id;
            }
          });
          break;
          case 'deleteClass':
          console.log('class',id)
          $.ajax({
            url: 'http://localhost:5000/classes/'+id,
            type: 'DELETE',
            success: function (result) {
              if(result) {
                window.location.href='admin.php?id='+admin_id;
              }
            }
          });
          break;
          case 'deleteUser':
          console.log('user: ',id)
          $.ajax({
            url: 'http://localhost:5000/users/'+id,
            type: 'DELETE',
            success: function (result) {
              alert(result)
              window.location.reload()
            },
            error: function (request, error, responseText) {
              console.log(responseText);
              alert(" Can't do because: " + error);
            }
          });
          break;
          case 'deleteTest':
          const test_id = (this.value);          
          $.ajax({
            url: 'http://localhost:5000/tests/'+test_id,
            type: 'DELETE',
            success: function (result) {
              alert(result);
              window.location.href='subject_overview.php?subjectID='+subject_id+'&loggedID='+admin_id;
              var objJSON = JSON.parse(result);
              if(objJSON == "not ok") {
                alert('It has no Test.')
              } else {
                window.location.href='subject_overview.php?subjectID='+subject_id+'&loggedID='+admin_id;
              }
            }
          });
          break;
          case 'archiveSubject':
          $.ajax({
            //:subject_id
            url: 'http://localhost:5000/subjects/archive/'+subject_id,
            type: 'PUT',
            success: function (result) {
              var objJSON = JSON.parse(result);
              if(objJSON == "not ok") {
                alert('It has no Test.')
              } else {
                window.location.href='subject_info.php?classID='+class_id+'&loggedID='+admin_id;
              }
            }
          });
          break;
          case 'assignStudent':
          console.log('user: ',id)
          console.log('class id: ',class_id)
          $.ajax({
            url: 'http://localhost:5000/classes/studentAssign/'+id+'/'+class_id,
            type: 'POST',
            success: function (result) {
              alert(result);
              window.location.href='assign_pupil.php?classID='+class_id+'&loggedID='+admin_id;
            // Do something with the result
            }
          });
          break;
          case 'deassignStudent':
          console.log('user: ',id)
          console.log('class id: ',class_id)
          $.ajax({
            url: 'http://localhost:5000/classes/studentDeassign/'+id+'/'+class_id,
            type: 'POST',
            success: function (result) {
              alert(result);
              window.location.href='assign_pupil.php?classID='+class_id+'&loggedID='+admin_id;
            // Do something with the result
            }
          });
          break;
        default:
          break;
      }
      
  });
  });

</script>